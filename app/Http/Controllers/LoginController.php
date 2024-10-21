<?php

namespace App\Http\Controllers;

use App\Models\User_master;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function user_login()
    {
        return view('authentication.user_login');
    }

    // Function to authenticate user
    public function authenticate_user(Request $request)
    {
        $user = User_master::where('role','=','Patient')->where('username','=',$request->username)->first();

        if(!is_null($user) && $user->password == md5($request->password))
        {
            // If username is found and the password matches then....
            session(['user' => $user->id]);
            return redirect()->route('add-appointment');
        }
    }

    public function admin_login()
    {
        return view('authentication.admin_login');
    }

    public function authenticate_admin(Request $request)
    {
        $user = User_master::where('role','=','Admin')->where('username','=',$request->username)->first();

        if(!is_null($user) && $user->password == md5($request->password))
        {
            session(['user' => $user->id]);
            return redirect()->route('appointment_master');
        }
    }
}
