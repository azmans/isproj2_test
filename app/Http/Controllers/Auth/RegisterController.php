<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Request;

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
    protected $redirectTo = '/dashboard';

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
            'bride_first_name' => ['required', 'string', 'max:30'],
            'bride_last_name' => ['required', 'string', 'max:30'],
            'groom_first_name' => ['required', 'string', 'max:30'],
            'groom_last_name' => ['required', 'string', 'max:30'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:soon_to_weds'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'dob' => ['required', 'date'],
            'wedding_date' => ['required', 'date'],
            'profile_picture' => ['required']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $image_name = 'null';
        if (Request::file('profile_picture')->isValid()) {

            $extension = Request::file('profile_picture')->getClientOriginalExtension();
            $image_name = uniqid().'.'.$extension;

            Request::file('profile_picture')->storeAs('images',$image_name);
        }

        return User::create([
            'bride_first_name' => $data['bride_first_name'],
            'bride_last_name' => $data['bride_last_name'],
            'groom_first_name' => $data['groom_first_name'],
            'groom_last_name' => $data['groom_last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'dob' => $data['dob'],
            'wedding_date' => $data['wedding_date'],
            'profile_picture' => $image_name,
        ]);
    }
}
