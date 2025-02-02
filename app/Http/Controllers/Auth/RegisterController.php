<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request; // Importing the Request class

class RegisterController extends Controller
{
    use RegistersUsers;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'role' => ['required', 'string'], // Ensure role is required
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'role' => $data['role'], // Assigning the role here
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    protected function registered(Request $request, $user)
    {
        // Redirect to the appropriate dashboard based on the user's role
        if ($user->role === 'Student') {
            return redirect()->route('dashboard.student');
        } elseif ($user->role === 'Parent') {
            return redirect()->route('dashboard.parent');
        }

        return redirect('/'); // Redirect to home if no role matches
    }
}
