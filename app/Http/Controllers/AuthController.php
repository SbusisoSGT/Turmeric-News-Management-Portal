<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * register profile for a given user.
     */
    public function showLogin(): View
    {
        return view('auth.login');
    }

    /**
     * register profile for a given user.
     */
    public function showRegister(): View
    {
        return view('auth.register');
    }

    /**
     * register profile for a given user.
     */
    public function register(Request $request): RedirectResponse
    {
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        $result = Auth::attempt(['email' => $user->email, 'password' => $request['password']]);

        if($result)
            return redirect('/');
    }

    /**
     * Login a given user.
     */
    public function login(Request $request): RedirectResponse
    {
        $result = Auth::attempt(['email' => $request['email'], 'password' => $request['password']]);

        if($result)
            return redirect('/');

        return back()->with([
            'status' => 'failed',
            'message' => 'Incorrect email or password! Try again. '
        ]);

    }

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
