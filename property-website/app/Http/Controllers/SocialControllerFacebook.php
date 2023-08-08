<?php

namespace App\Http\Controllers;

use Exception;
use Validator;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\AdminProduct;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;


class SocialControllerFacebook extends Controller
{
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function loginWithFacebook()
    {
        try {

            $user = Socialite::driver('facebook')->stateless()->user();
            $existingUser = User::where('social_id', $user->id)->first();
            $stms_code = random_int(1000, 9999);
            if ($existingUser) {
                // Auth::login($existingUser);
                // $product = AdminProduct::inRandomOrder()->get();
                Auth::login($existingUser);
                return redirect('/');

                return view('/users.index', compact('product',));
            } else {

                $uuid = Str::uuid()->toString();
                $createUser = User::create([

                    'name' => $user->name,
                    'email' => $user->email,
                    'avatar' => $user->avatar,
                    'social_id' => $user->id,
                    'password' => $user->password = Hash::make($uuid . now())

                    //'stms_code' => $user->psaaword,
                    //'password' => encrypt('admin@123')
                ]);

                Auth::login($createUser);
                return redirect('/');

                // Auth::login($createUser);
                // $product = AdminProduct::inRandomOrder()->get();

                // return view('/users.index', compact('product',));
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
