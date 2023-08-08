<?php

namespace App\Http\Controllers;

use Exception;
use Validator;
use App\Models\User;

// use Socialite;
use Illuminate\Support\Str;
use App\Models\AdminProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
// use Laravel\Socialite\Facades\Socialite;
class SocialController extends Controller
{
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }
    public function loginWithGoogle()
    {

        try {
            $user = Socialite::driver('google')->stateless()->user();
            //  dd("jdhsbvjhdb");
            $existingUser = User::where('social_id', $user->id)->first();
            // dd($existingUser);
            if ($existingUser) {
                Auth::login($existingUser);
                return redirect('/');

                // return view('/users.index', compact('product',));
            } else {
                $uuid = Str::uuid()->toString();
                $createUser = User::create([

                    'name' => $user->name,
                    'email' => $user->email,
                    'avatar' => $user->avatar,
                    'social_id' => $user->id,
                    'password' => $user->password = Hash::make($uuid . now())
                    // 'password' => $user->password
                    // 'password' => encrypt('admin@123')
                ]);

                Auth::login($createUser);
                return redirect('/');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
