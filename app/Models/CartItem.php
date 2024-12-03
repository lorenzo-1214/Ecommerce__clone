<?php

// File: app/Models/CartItem.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    // Definire i campi che possono essere massivamente assegnati
    protected $fillable = ['user_id', 'product_id', 'quantity'];

    /**
     * Relazione tra articolo del carrello e utente (un articolo appartiene a un utente)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relazione tra articolo del carrello e prodotto (un articolo è un prodotto)
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
