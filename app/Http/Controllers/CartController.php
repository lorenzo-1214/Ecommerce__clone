<?php

// File: app/Http/Controllers/CartController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CartItem;

class CartController extends Controller
{
    public function index()
    {
        // Verifica che l'utente sia autenticato
        if (Auth::check()) {
            // Ottieni gli articoli del carrello per l'utente
            $cartItems = Auth::user()->cartItems;

            // Calcola il totale del carrello
            $total = $cartItems->sum(function ($cartItem) {
                return $cartItem->product->price * $cartItem->quantity;
            });

            // Restituisci la vista con i dati del carrello
            return view('cart.index', compact('cartItems', 'total'));
        }

        return redirect()->route('login');
    }
}
