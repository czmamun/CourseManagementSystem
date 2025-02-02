<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; // Importing the Request class

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
    protected $redirectTo = '/home'; // This will be updated in the login method

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        // Redirect to the appropriate dashboard based on the user's role
        if ($user->role === 'Student') {
            return redirect()->route('dashboard.student');
        } elseif ($user->role === 'Parent') {
            return redirect()->route('dashboard.parent');
        }

        return redirect()->route('home'); // Default redirect
    }
}
