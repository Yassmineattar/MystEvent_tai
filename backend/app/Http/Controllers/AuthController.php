<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Afficher le formulaire d'inscription.
     */
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /**
     * Traiter l'inscription.
     */
    public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'user_type' => 'required|in:organizer,participator',
    ]);

    try {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => $request->user_type,
        ]);

        Auth::login($user);

        return redirect()->route('home')->with('success', 'Inscription réussie ! Bienvenue sur la plateforme.');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'Une erreur est survenue. Veuillez réessayer.']);
    }
}

    /**
     * Afficher le formulaire de connexion.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Traiter la connexion.
     */
    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]);

    $remember = $request->has('remember');

    if (Auth::attempt($request->only('email', 'password'), $remember)) {
        return redirect()->route('home');
    }

    // Message d'erreur plus précis
    return back()->withErrors([
        'email' => 'L’adresse email ou le mot de passe est incorrect. Veuillez vérifier vos informations et réessayer.',
    ]);
}

    /**
     * Déconnexion de l'utilisateur.
     */
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
