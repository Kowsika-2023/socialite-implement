<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Log;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {

        return view('backendviews.login');

    }

public function checkCredentials(Request $request){

    $request->validate([
        'user_name' => 'required',
        'password' => 'required',
    ]);


    $remember = $request->has('remember') ? true : false;
    $credentials = Auth::guard('admin')->attempt(['password' => $request->password, 'user_name' => $request->user_name, 'status' => 1]);

 if (Auth::viaRemember()) {

      return redirect('admins.index')->with('message', 'Welcome Back Successfully Logged in')->with('status', asset('assets/icon/success.gif'));

    }
    else if (Auth::guard('admin')->attempt(['password' => $request->password, 'user_name' => $request->user_name, 'status' => 1])) {
       return redirect()->route('admins.index')->with('message', 'Welcome Back Successfully Logged in')->with('status', asset('assets/icon/success.gif'));;

    }
    else if(Auth::guard('admin')->attempt(['password' => $request->password, 'user_name' => $request->user_name, 'status' => 0])) {

        return redirect()->route('login')->with('message','Please Active the Status')->with('status', asset('assets/icon/info.png'));

    }
    else if(!$credentials){

       return redirect()->route('login')->with('message','Invalid Credentials')->with('status', asset('assets/icon/info.png'));

    }else {

        return redirect()->route('login');

    }
}
    public function logout()
    {
        $admin = request()->user();
       Auth::logout();
       return redirect()->route('login');

    }


}
