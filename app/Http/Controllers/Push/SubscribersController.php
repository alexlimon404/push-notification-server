<?php

namespace App\Http\Controllers\Push;

use App\Models\ServerKey;
use App\Models\Subscribers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SubscribersController extends Controller
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
    public function index(Request $request)
    {
        $userId = Auth::id();
        $domainNames = ServerKey::where('user_id', $userId)->get();
        $deviceTypes = [];
        return view('push.subscribers')
            ->with('domainNames', $domainNames)
            ->with('deviceTypes', $deviceTypes);
    }

    public function count(Request $request)
    {
        $userId = Auth::id();
        $domainNames = ServerKey::where('user_id', $userId)->get();
        $domain = ServerKey::where('id', $request->domain)->first();
        $deviceTypes = DB::table('subscribers')
            ->select(DB::raw('count(*) as device_count, device_type'))
            ->where('server_key_id', 'like', $request->domain)
            ->where('device_type', 'like', '%%')
            ->groupBy('device_type')
            ->get();
        return view('push.subscribers')
            ->with('domainNames', $domainNames)
            ->with('deviceTypes', $deviceTypes)
            ->with('domain', $domain);

    }
}
