<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\SendNewPasswordRequest;
use App\Services\AuthService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    protected AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function showRegistrationForm(): View
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request): RedirectResponse
    {
        $this->authService->registerUser($request->validated());

        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }

    public function showLoginForm(): View
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        if (Auth::attempt($request->validated())) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function showForgotPasswordForm(): View
    {
        return view('auth.forgot-password');
    }

    public function sendNewPassword(SendNewPasswordRequest $request): RedirectResponse
    {
        $this->authService->resetPassword($request->validated('email'));

        return back()->with('success', 'A new password has been sent to your email address.');
    }
}
