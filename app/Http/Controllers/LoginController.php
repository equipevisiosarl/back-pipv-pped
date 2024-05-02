<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'login' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'login' => 'Username ou mot de passe incorrecte.',
        ])->onlyInput('login');
    }

    public function logout()
    {
        // Déconnexion de l'utilisateur actuellement authentifié
        Auth::logout();

        // Redirection vers une autre page après la déconnexion
        return redirect('/login');
    }
}
