<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Events\CreateNewUser;
use App\Http\Requests\LoginRequest;
use Validator;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/user';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
        ]);
    }

    public function showLoginForm()
    {
        return view('themes.shoppe.auth.login');
    }

    public function showRegistrationForm()
    {
        return view('themes.shoppe.auth.register');
    }

    /**
     * Process login to applications for user or client
     * @param  Request $request request form input
     * @return json
     */
    public function postlogin(LoginRequest $request)
    {
        if (Auth::attempt($request->only('email', 'password'), $request->has('remember') )) {
           return redirect($this->redirectAfter());
        } else {
               return back()
                ->withErrors(['email' => 'Email atau password yang anda inputkan salah.'])
                ->withInput();
        }
    }

    /**
     * Process registration to applications for user or client
     * @param  Request $request request form input
     * @return json
     */
    public function postRegistration(Request $request)
    {
        $validation = $this->validator($request->all());

        if ($validation->fails()) {
           return back()
                ->withErrors($validation)
                ->withInput();
        }
        event(new CreateNewUser($user = $this->create($request->all())));

        $user->roles()->attach([2]);

        Auth::guard()->login($user);

        return redirect($this->redirectAfter());
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogout()
    {
        Auth::logout();

        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
    }

    /**
     * Redirect path after process login or registration
     * @return \Illuminate\Http\Response
     */
    public function redirectAfter()
    {
        return (parse_url(url()->previous(), PHP_URL_PATH) === '/checkout') ?
            '/checkout' : strtolower( auth()->user()->roles()->first()->name );
    }
}
