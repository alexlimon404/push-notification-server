<?php

namespace App\Http\Controllers\Push;

use App\Models\Subscribers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        return view('push.send_message');
    }

    public function makePush(Request $request)
    {
        return redirect('dashboard/push');
    }
}
