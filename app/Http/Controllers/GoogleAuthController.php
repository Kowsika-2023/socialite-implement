<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect(){

        return Socialite::driver('google')->redirect();

    }

    public function googleCallback() {

        Log::info("inside googleCallback");

        try{

            $googleUser = Socialite::driver('google')->user();

            $user = Admin::where('email', $googleUser->email)->first();

            if(!$user){

                $newUser = Admin::create([
                    'name' => $googleUser->name,
                    'user_name' => 'edward josh',
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'mobile' => '9999999999',
                    'password' => Hash::make('admin')
                ]);

                Auth::guard('admin')->login($newUser);
                return redirect()->intended('dmw/admins');

            }
            else{

                Auth::guard('admin')->login($user);
                return redirect()->intended('dmw/admins');

            }


        }
        catch(Exception $e){

             return $e->getMessage();

        }

    }
}
