<?php
// File: routes/web.php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

// Rotte per il login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

// Rotte per la registrazione
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

// Rotta per il logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
