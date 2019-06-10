<?php

namespace App\Http\Controllers\Push\Settings;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class MyProfileController extends Controller
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
        $user = auth()->user();
        return view('push.settings.my_profile', [
            'user' => $user
        ]);
    }

    public function changeEmailAndPass(Request $request)
    {
        if (!Hash::check($request->get('old_password'), auth()->user()->password)) {
            return redirect()->route('my_profile_settings')->with([
                    'alert' => 'alert alert-danger',
                    'message' => 'Old password is not correct'
                ]);
        }
        if (!($request->get('password') === $request->get('password_confirmation'))) {
            return redirect()->route('my_profile_settings')->with([
                    'alert' => 'alert alert-danger',
                    'message' => 'Passwords do not match'
                ]);
        }
        $idUser = auth()->user()->id;
        $user = User::find($idUser);
        $user->email = $request->email;
        $user->password = bcrypt($request->get('password'));
        $user->save();
        return redirect()->route('my_profile_settings')->with([
            'alert' => 'alert alert-success',
            'message' => 'Success'
        ]);
    }
}
