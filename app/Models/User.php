<?php

// File: app/Models/User.php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Altri metodi e proprietà...

    /**
     * Relazione tra l'utente e gli articoli del carrello (uno a molti)
     */
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
}
