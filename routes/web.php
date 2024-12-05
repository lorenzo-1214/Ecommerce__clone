<?php
// File: routes/web.php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Pagina principale, visualizza i prodotti
Route::get('/', [ProductController::class, 'index'])->name('home');

// Visualizza tutti i prodotti
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Visualizza il dettaglio di un singolo prodotto
Route::get('/product/{id}', [ProductController::class, 'show'])->name('products.show');

// Aggiungi un prodotto al carrello
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');

// Visualizza il carrello (solo utenti autenticati)
Route::middleware('auth')->get('/cart', [CartController::class, 'index'])->name('cart.index');

// Rimuovi un prodotto dal carrello (solo utenti autenticati)
Route::middleware('auth')->delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

// Visualizza gli ordini dell'utente (solo utenti autenticati)
Route::middleware('auth')->get('/orders', [OrderController::class, 'index'])->name('orders.index');

// Visualizza il dettaglio di un ordine (solo utenti autenticati)
Route::middleware('auth')->get('/order/{id}', [OrderController::class, 'show'])->name('orders.show');


// Rotta per la pagina degli ordini
Route::get('/orders', function () {
    return view('orders');
})->name('orders.index');


// Rotta per la pagina dei prodotti
Route::get('/products', function () {
    return view('products');
})->name('products.index');


// Rotta per la pagina del carrello
Route::get('/cart', function () {
    return view('cart');
})->name('cart.index');


// Rotta per la pagina di login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Rotta per la pagina di registrazione
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

