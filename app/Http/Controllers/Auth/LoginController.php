<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->role == 'admin') {
            return redirect()->route('product');
        } else {
            return redirect()->route('LandingPage');
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Fetch the user by email without checking the password hash
        $user = User::where('email', $credentials['email'])->first();

        if ($user && $user->password == $credentials['password']) {
            // Authentication passed
            Auth::login($user);
            if ($user->role == 'admin') {
                return redirect()->route('product');
            } elseif ($user->role == 'user'){
                return redirect()->route('userDashboard');
            }
            
        }

        // Authentication failed
        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect('/login');
    }
}
