<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Mostra gli ordini dell'utente.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Recupera tutti gli ordini dell'utente autenticato
        $orders = Auth::user()->orders;
        
        // Passa i dati alla vista 'orders.index' per visualizzare gli ordini
        return view('orders.index', compact('orders'));
    }

    /**
     * Mostra i dettagli di un ordine specifico.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // Recupera l'ordine specifico dall'utente autenticato
        $order = Order::where('user_id', Auth::id())->findOrFail($id);
        
        // Passa i dati alla vista 'orders.show' per visualizzare i dettagli dell'ordine
        return view('orders.show', compact('order'));
    }
}
