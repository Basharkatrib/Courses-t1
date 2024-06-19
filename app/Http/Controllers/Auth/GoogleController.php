<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback() 
    { 
        try { 
            $user = Socialite::driver('google')->stateless()->user(); // استخدام stateless إذا كنت تواجه مشاكل في الجلسات
            Log::info('User from Google', ['user' => $user]); 
            $finduser = User::where('email', $user->email)->first(); 
            Log::info('Found User', ['user' => $finduser]); 
            
            if ($finduser) { 
                Auth::login($finduser); 
                Session::regenerate(); // أعد توليد جلسة جديدة
                Log::info('User logged in', ['user' => $finduser]); 
                return redirect()->intended('/'); 
            } else { 
                $newUser = User::create([ 
                    'name' => $user->name, 
                    'email' => $user->email, 
                    'google_id' => $user->id, 
                    'password' => bcrypt('my-google') 
                ]); 
                Auth::login($newUser); 
                Session::regenerate(); // أعد توليد جلسة جديدة
                Log::info('New User created and logged in', ['user' => $newUser]); 
                return redirect()->intended('/'); 
            } 
        } catch (Exception $e) { 
            Log::error('Error during Google authentication', ['error' => $e->getMessage()]); 
            return redirect('/'); 
        } 
    } 
}
