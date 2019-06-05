<?php

namespace App\Http\Controllers\Push;

use App\Http\Requests\ImageRequest;
use App\Models\Country;
use App\Models\Image;
use App\Models\PushMessage;
use App\Models\SentMessages;
use App\Models\ServerKey;
use App\Models\Subscribers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $countries = Country::all();
        $deviceTypes = ['desktop', 'mobile', 'tablet'];
        $userId = Auth::id();
        $domainNames = ServerKey::where('user_id', $userId)->get();
        return view('push.send_message', [
            'countries' => $countries,
            'deviceTypes' => $deviceTypes,
            'domainNames' => $domainNames
        ]);
    }

    public function create(Request $request)
    {
        $userId = Auth::id();
        $image = $request->file('imageFile');
        $icon = $request->icon;
        if($image) {
            $result = Image::uploadImage($image, $userId);
            $icon = url('/') . '/images/' . $result->image_path;
        }
        //write message
        $message = new PushMessage;
        $message->server_key_id = $request->domain;
        $message->title = $request->title;
        $message->body = $request->body;
        $message->icon = $icon;
        $message->click_action = $request->click_action;
        $message->save();
        //get id subscribers
        $subscribers = Subscribers::where('server_key_id', $request->domain)
            ->when($request->device_type, function ($query, $device_type) {
                return $query->where('device_types', $device_type);
            })
            ->get();
        //write sent push
        $subscriberTokens = [];
        foreach ($subscribers as $subscriber) {
            SentMessages::create([
                'push_message_id' => $message->id,
                'subscriber_id' => $subscriber->id
            ]);
            array_push($subscriberTokens, $subscriber->token);
        };
        $serverKey = ServerKey::where('id', $request->domain)->first();
        //sent message
        $sendingResult = json_decode(WorkerController::sendNotification($serverKey, $subscriberTokens, $message), true);
        //update status message
        $updateMessage = PushMessage::find($message->id);
        $updateMessage->multicast_id = $sendingResult['multicast_id'];
        $updateMessage->success = $sendingResult['success'];
        $updateMessage->failure = $sendingResult['failure'];
        $updateMessage->canonical_ids = $sendingResult['canonical_ids'];
        $updateMessage->save();
        return redirect()->route('page_push')
            ->with('domain', $serverKey->domain_name)
            ->with('success', $updateMessage->success)
            ->with('failure', $updateMessage->failure)
            ->with('title', $message->title)
            ->with('body', $message->body)
            ->with('icon', $message->icon)
            ->with('click_action', $message->click_action);
    }
}
