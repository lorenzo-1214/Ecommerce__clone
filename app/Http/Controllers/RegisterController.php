<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    // Mostra il form di registrazione
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Gestisce la registrazione
    public function register(Request $request)
    {
        // Validazione dei dati
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        // Creazione dell'utente
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'is_admin' => false, // Default è false, lo cambiamo solo per l'admin
        ]);

        // Login automatico con il metodo Auth::login()
        Auth::login($user);

        // Redirect alla home
        return redirect()->route('home');
    }
}
