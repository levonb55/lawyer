<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * @param Request $request
     * @param $user
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function authenticated(Request $request, User $user)
    {
//        if($user->role_id == 1){
//            return redirect()->intended('admin/dashboard');
//        } elseif ($user->role_id == 2){
////            return redirect()->intended('lawyer/dashboard/' . $user->id);
//            return redirect()->intended('users/dashboard/' . $user->id);
//        } elseif ($user->role_id == 3){
//            return redirect()->intended('user/dashboard');
//        }

        if($user->role_id == 1){
            return redirect()->intended('admin/dashboard');
        } else {
            return redirect()->intended('users/dashboard/' . $user->id);
        }
    }
}
