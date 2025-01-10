<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Afficher le formulaire de modification des informations utilisateur
    public function edit()
    {
        return view('user.settings');
    }

    // Mettre à jour les informations utilisateur
    public function update(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'password' => 'nullable|string|min:6|confirmed', // Si un mot de passe est fourni
        ]);

        $user = Auth::user();

        // Mise à jour des informations de l'utilisateur
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return redirect()->route('user.settings')->with('success', 'Informations mises à jour avec succès.');
    }
}
