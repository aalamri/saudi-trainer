<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use App\Providers\RouteServiceProvider;
use App\User;
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
    protected $redirectTo = RouteServiceProvider::MAIN;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'bio' => ['required', 'string', 'max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'bio' => $data['bio'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }
    public function register(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->bio = $request->bio;
        $user->password = Hash::make($request->password);
        $user->verification_code = sha1(time());
        $user->save();

        // if($user != null) {
        //     //Send email
        //     MailController::sendSignupEmail($user->name,$user->email, $user->verification_code);
        //     //message to user 
        //     return redirect()->back()->with(session()->flash('alert-success', 'Your account has been created please check email for verification link.'));

        //     // show error
        //     return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong.'));

        // }
    }

    public function verifyUser(Request $request) {
        $verification_code = \Illuminate\Support\Facades\Request::get('code');
        $user = User::where(['verification_code' => $verification_code])->first();
        if($user != null) {
            $user->is_verified = 1;
            $user->save();
            return redirect()->route('login')->with (session()->flash('alert-success', 'Your account is verified you can login'));
        }
        return redirect()->route('login')->with (session()->flash('alert-danger', 'invalid verification code'));

    }
}
