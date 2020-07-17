<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function showLoginForm()
    {
        $data = [
            'page_title' => 'Sign In',
            'page_header' => 'Sign In',
            'sliders' => Slider::latest()->take(2)->get()
        ];

        return view('frontend.login')->with($data);
    }

    /**
     * find username or email
     *
     * @return string
     */
    public function username()
    {
        if (filter_var(request()->email, FILTER_VALIDATE_EMAIL)) {
            return 'email';
        } else {
            return 'username';
        }
    }

    /**
     * login validtion
     *
     * @return string
     */
    public function loginValidation(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
    }

    /**
     * attempt login with username or email
     *
     * @return void
     */
    public function login(Request $request)
    {
        $this->loginValidation($request);

        //attempt login with usename or email
        Auth::attempt([$this->username() => $request->email, 'password' => $request->password]);

        //was any of those correct ?
        if (Auth::check()) {
            // active or not
            if (Auth::user()->approve != 1) {
                Auth::logout();

                return redirect()->back()->withErrors([
                    'email' => 'Please wait for admin approval'
                ]);
            } else if (Auth::user()->status != 1) {
                Auth::logout();
                
                return redirect()->back()->withErrors([
                    'email' => 'Sorry you are inactive by admin, please contact with our supports'
                ]);
            }

            if (Auth::user()->hasRole('user')) {
                return redirect()->intended('/');
            }

            Auth::logout();
        }

        //Nope, something wrong during authentication
        return redirect()->back()->withErrors([
            'email' => 'Invalid Email/Username or Password'
        ]);
    }

    //custom-logout
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
