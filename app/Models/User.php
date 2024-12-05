<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    // Aggiungi qui i campi che possono essere assegnati in massa
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',  // Aggiungi anche il campo is_admin
    ];

    // Se usi anche il campo password e lo vuoi protetto, aggiungi:
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Se hai bisogno di castare i dati, per esempio 'is_admin' a booleano
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'boolean',
    ];
}
