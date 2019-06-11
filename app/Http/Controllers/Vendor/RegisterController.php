<?php

namespace App\Http\Controllers\Vendor;

use App\Vendor;
use App\Admin;
use App\Notifications\NewVendor;
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
    protected $redirectTo = '/vendor/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:vendor');
    }

    public function showRegistrationForm()
    {
        return view('vendor.register');
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
            'first_name' => ['required', 'string', 'max:30'],
            'last_name' => ['required', 'string', 'max:30'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:vendors'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'mobile' => ['required', 'string', 'max:11', 'unique:vendors'],
            'company_name' => ['required', 'string', 'max:50'],
            'vendor_type' => ['required', 'string', 'max:25'],
            'price_range' => ['required', 'string', 'max:15'],
            'tin' => ['required', 'string', 'max:20', 'unique:vendors'],
            'sec_dti_number' => ['required', 'string', 'max:25', 'unique:vendors'],
            'mayors_permit' => ['required', 'string', 'max:20', 'unique:vendors'],
            'city' => ['required', 'string', 'max:30'],
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

        $vendor = Vendor::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'mobile' => $data['mobile'],
            'company_name' => $data['company_name'],
            'vendor_type' => $data['vendor_type'],
            'price_range' => $data['price_range'],
            'tin' => $data['tin'],
            'sec_dti_number' => $data['sec_dti_number'],
            'mayors_permit' => $data['mayors_permit'],
            'city' => $data['city'],
            'profile_picture' => $image_name
        ]);

        $admin = Admin::where('user_type', 'admin')->first();
        if ($admin) {
            $admin->notify(new NewVendor($vendor));
        }

        return $vendor;

    }
}
