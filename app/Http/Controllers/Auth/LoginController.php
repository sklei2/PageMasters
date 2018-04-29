<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User as User;
use App\Http\Controllers\Auth\RegisterController;

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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/books';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function GetLoginPage() {
        return view('auth/login');
    }

    public function logout() {
        Auth::logout();
        return redirect('login')->with(Auth::logout());
    }

    public function loginWithGoogle(Request $request)
    {
        // get data from request
        $code = $request->get('code');
        
        // get google service
        $googleService = \OAuth::consumer('Google');
        
        // check if code is valid
        
        // if code is provided get user data and sign in
        if ( ! is_null($code))
        {
            // This was a callback request from google, get the token
            $token = $googleService->requestAccessToken($code);
            
            // Send a request with it
            $result = json_decode($googleService->request('https://www.googleapis.com/oauth2/v1/userinfo'), true);
            $user = User::where('name', '=', $result['name'])->get();

            if ($user->isNotEmpty()) {
                $creds = array(
                    'email' => $result['email'],
                    'password' => $result['id']
                );
                if (Auth::attempt($creds)){
                    return redirect()->intended('/books');
                }
            } else {
                app('App\Http\Controllers\Auth\RegisterController')->create(
                    array( 
                        'name' => $result['name'], 
                        'password' => $result['id'],
                        'email' => $result['email']
                    )
                );
                $creds = array(
                    'email' => $result['email'],
                    'password' => $result['id']
                );
                if (Auth::attempt($creds)){
                    return redirect()->intended('/books');
                }
            }
        }
        // if not ask for permission first
        else
        {
            // get googleService authorization
            $url = $googleService->getAuthorizationUri();
            
            // return to google login url
            return redirect((string)$url);
        }
    }
}
