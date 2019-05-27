<?php

namespace App\Http\Controllers\Push\Settings;

use App\Models\ServerKey;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MyServerController extends Controller
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
        return view('push.settings.my_server')
            ->with('domainNames', $domainNames);
    }

    public function create(Request $request)
    {
        //create server
        $server = new ServerKey;
        $server->user_id = Auth::id();
        $server->domain_name = $request->domain;
        $server->sender_id = $request->sender_id;
        $server->server_key = $request->server_key;
        $server->legacy_server_key = $request->legacy_server_key;
        $server->save();
        return view('push.settings.my_server');
    }
}
