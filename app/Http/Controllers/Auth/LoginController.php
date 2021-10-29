<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $maxAttempts = 3;
    protected $decayMinutes = 1;

    public function showLoginForm()
    {
        if(!session()->has('url.intended'))
        {
            session(['url.intended' => url()->previous()]);
        }
        return view('auth.login');
    }
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected function redirectTo()
    {
        if (Auth::user()->role_id == 1){
            return route('admin.index');
        }elseif (Auth::user()->role_id == 2){
            $this->redirectTo = url()->previous();
        }elseif (Auth::user()->role_id == 3){
            return route('stakeholder.index');
        }
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
