<?php

namespace App\Http\Controllers\Push;

use App\Models\Country;
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
        $user = Auth::id();
        $domainNames = ServerKey::where('user_id', $user)->get();
        return view('push.send_message')
            ->with('countries', $countries)
            ->with('deviceTypes', $deviceTypes)
            ->with('domainNames', $domainNames);
    }

    public function makePush(Request $request)
    {
        //write message
        $message = new PushMessage;
        $message->title = $request->title;
        $message->body = $request->body;
        $message->icon = $request->icon;
        $message->click_action = $request->click_action;
        $message->save();
        //get id subscribers
        $subscribers = Subscribers::when($request->device_type, function ($query, $device_type) {
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
        WorkerController::sendNotification($serverKey, $subscriberTokens, $message);
        return redirect('dashboard/push');
    }
}
