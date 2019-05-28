<?php

namespace App\Http\Controllers\Push;

use App\Models\PushMessage;
use App\Models\ServerKey;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StatisticsController extends Controller
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
        $userId = Auth::id();
        $domainNames = ServerKey::where('user_id', $userId)->get();
        $messages = [];
        return view('push.statistics')
            ->with('domainNames', $domainNames)
            ->with('messages', $messages);
    }

    public function showMessage(Request $request)
    {
        $userId = Auth::id();
        $domainNames = ServerKey::where('user_id', $userId)->get();
        $domain = ServerKey::where('id', $request->domain)->first();
        //dd($domain->domain_name);
        $messages = PushMessage::where('server_key_id', $request->domain)->get();
        return view('push.statistics')
            ->with('domainNames', $domainNames)
            ->with('messages', $messages)
            ->with('domain', $domain);
    }
}
