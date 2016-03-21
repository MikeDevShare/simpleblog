<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Requests\Auth\LoginRequest; 
use App\Http\Requests\Auth\RegisterRequest;
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
   protected $user; 
    
    /**
     * For Guard
     *
     * @var Authenticator
     */
    protected $auth;

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Guard $auth, User $user)
    {
        $this->user = $user; 
        $this->auth = $auth;
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
            'password' => bcrypt($data['password']),
        ]);
    }
     protected function getLogin() {
        return View('auth.login');
    }

    protected function postLogin(LoginRequest $request) {
        if ($this->auth->attempt($request->only('email', 'password'))) {
            var_dump($this->auth->check());die();
            return redirect('dashboard');
        }
 
        return redirect('auth/login')->withErrors([
            'email' => 'The email or the password is invalid. Please try again.',
        ]);
    }

    /* Register get post methods */
    protected function getRegister() {
        return View('auth.register');
    }

    protected function postRegister(RegisterRequest $request) {

        $this->user->name = $request->name;
        $this->user->email = $request->email;
        $this->user->password = bcrypt($request->password);
        $this->user->save();
        return redirect('auth/login');
    }

    /**
     * Log the user out of the application.
     *
     * @return Response
     */
    protected function getLogout()
    {
        $this->auth->logout();
        return redirect('auth/login');
    }
}
