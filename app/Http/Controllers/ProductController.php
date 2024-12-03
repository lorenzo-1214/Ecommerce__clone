<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Mostra la lista di tutti i prodotti.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Recupera tutti i prodotti dal database
        $products = Product::all();
        
        // Passa i dati alla vista 'home' che visualizzerà la lista dei prodotti
        return view('home', compact('products'));
    }

    /**
     * Mostra i dettagli di un singolo prodotto.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // Recupera il prodotto specifico dal database
        $product = Product::findOrFail($id);
        
        // Passa i dati alla vista 'product.show' per visualizzare il prodotto
        return view('product.show', compact('product'));
    }
}
