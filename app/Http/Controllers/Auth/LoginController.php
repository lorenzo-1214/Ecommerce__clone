<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Mostra il form di login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Gestisce il login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'Le credenziali non corrispondono ai nostri record.',
        ]);
    }

    // Gestisce il logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
