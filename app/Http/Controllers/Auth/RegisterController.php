<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\GuestUserHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
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
    protected $redirectTo;

    /**
     * Apply the redirecting url
     *
     * @return void
     */
    public function __construct()
    {
        // Get redirectTo path for user
        $this->redirectTo = GuestUserHelper::getRedirectUrl();

        $this->middleware('guest');

        // Check user is a contributor or not
        $this->middleware('contributor')->only('register');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile_no' => ['required', 'digits:10'],
            'password' => ['required', 'string', 'min:8', 'max:255', 'confirmed'],
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
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile_no' => $data['mobile_no'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /*
     * Modify the response after user registration
     */
    protected function registered(Request $request, $user)
    {
        Toastr::success("Wecome, $user->name ! You Are Successfully Registered.", 'success');

        return redirect()->route('verification.notice');
    }
}
