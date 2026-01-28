<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{

    public function googleLogin()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleAuthentication()
    {
        // try{
        //     $googleUser = Socialite::driver('google')->user();
        //     $user = User::where('google_id', $googleUser->id)->first();
        //         if($user) {
        //             Auth::login($user);
        //             return redirect()->route('dashboard');
        //         } else {
        //             $userData = User::create([
        //                     'name' => $googleUser->name,
        //                     'email' => $googleUser->email,
        //                     'google_id' => $googleUser->id,
        //                     'email_verified_at' => now(),
        //                     'password' => null,
        //             ]);
        //             if ($userData) {
        //                 Auth::login($userData);
        //                 return redirect()->route('dashboard');
        //             }
        //             }
        //             } catch (Exception $e){
        //                 dd($e);
        //             }


        try {
            $googleUser = Socialite::driver('google')->user();

            // 1️⃣ google_id OR email দিয়ে user খুঁজো
            $user = User::where('google_id', $googleUser->id)
                ->orWhere('email', $googleUser->email)
                ->first();

            // 2️⃣ যদি user না থাকে → create
            if (!$user) {
                $user = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'email_verified_at' => now(),
                    'password' => null,
                    'role_id' => 5, // optional
                ]);
            } else {
                // 3️⃣ আগে signup করা থাকলে google_id update করো
                if (!$user->google_id) {
                    $user->update([
                        'google_id' => $googleUser->id
                    ]);
                }
            }

            // 4️⃣ Login
            Auth::login($user);

            return redirect()->route('dashboard');
        } catch (Exception $e) {
            return redirect()->route('login')
                ->with('error', 'Google login failed!');
        }
    }
}
