<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    protected function authenticated()
    {
    
    
        // if (str_contains(url()->previous(),'redirect_back')) { 
        //     // dd(url()->previous());
        //      $url = url()->previous();
        //      $url = parse_url($url , PHP_URL_QUERY);
        //      parse_str($url,$redirct);
    
        //      return redirect()->to($redirct['redirect_back']);
        //      die();
             
        //  }
        if(Auth::user()->user_role == '1'){
            return redirect('admin/dashboard')->with('status','Welcome to Dashboard');
        }else{
            return redirect('/')->with('status','Login In Successfully');
        }
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }





}
