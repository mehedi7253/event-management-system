<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => ['required', 'string', 'max:255','regex:/^[a-zA-Z-.\s]+$/'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone'    => ['required', 'string', 'min:11', 'max:11','regex:/^[-0-9\+]+$/'],
            'gender'   => ['string', 'max:255'],
            'address'  => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
        ],[
            'name.required'      => "please Enter Name",
            'name.regex'         => "Please Enter Only Character Value",
            'email.required'     => "Please Enter Email Address",
            'email.unique'       => "This Email Already Registered",
            'phone.required'     => "please Enter Phone Number",
            'phone.min'          => "Phone Number Must Be 11 Digit",
            'phone.max'          => "Phone Number Must Be 11 Digit",
            'phone.regex'        => "Phone Number Must Be 11 Digit Long Numeric Value",
            'gender.required'    => "Please Select One",
            'address.required'   => "please Enter address",
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'phone'    => $data['phone'],
            'gender'   => $data['gender'],
            'address'  => $data['address'],
            'password' => Hash::make($data['password']),
            'role_id'  => '2',
            'status'   => '0'
        ]);
    }
}
