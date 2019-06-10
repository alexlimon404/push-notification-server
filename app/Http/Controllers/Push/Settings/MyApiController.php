<?php

namespace App\Http\Controllers\Push\Settings;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class MyApiController extends Controller
{
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
        $user = auth()->user();
        return view('push.settings.my_api', [
            'user' => $user
        ]);
    }

    public function changeApi(Request $request)
    {
        $idUser = auth()->user()->id;
        $user = User::find($idUser);
        $user->api_token = Str::random(40);
        $user->save();
        return redirect()->route('my_api_settings');
    }
}
