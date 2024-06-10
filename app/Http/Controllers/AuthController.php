<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\http\RedirectResponse;


class AuthController extends Controller
{
    public function __construct()
    {
        if (Auth::viaRemember()) {
            return redirect()->intended('/');
        }
        $this->middleware('guest', ['except' => 'Logout']);
    }
    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $ValidateData = $request->validate([
            'email' => 'required|email:dns|max:255',
            'password' => 'required|min:8|max:25'
        ]);

        if (Auth::attempt(['email' => $ValidateData['email'], 'password' => $ValidateData['password']], $request->has('remember'))) {
            return redirect()->intended('/')->with('toast_success', 'Login Successfull!');
        }
        return redirect()->back()->with('error', 'Invalid Credentials');
    }

    public function Register()
    {
        return view('auth.register');
    }

    public function RegisterPost(Request $request)
    {
        $ValidateData = $request->validate([
            'name' => 'required|max:255|min:5',
            'email' => 'required|email:dns|max:255',
            'password' => 'required|min:8|max:25|confirmed',
        ]);
        $ValidateData['password'] = bcrypt($ValidateData['password']);
        if ($user = User::create($ValidateData)) {
            return redirect()->route('login')->with('success', 'User created successfully.');
        }

        return redirect()->back()->with('error', 'Something went wrong.');
    }

    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function forgotPasswordPost(Request $request)
    {
        $ValidateData = $request->validate([
            'email' => 'required|email:dns|max:255',
        ]);

        $status = Password::sendResetLink(
            $ValidateData
        );
        return $status === Password::RESET_LINK_SENT
            ? back()->with(['success' => __($status)])
            : back()->withErrors(
                ['email' => __($status)]
            );
    }

    public function ResetPassword($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
