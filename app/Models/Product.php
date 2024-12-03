<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // I campi che sono "mass assignable" (che possono essere assegnati in massa)
    protected $fillable = ['name', 'description', 'price', 'image'];

    /**
     * Relazione tra prodotto e carrello (molti a molti)
     */
    public function cartItems()
    {
        return $this->belongsToMany(CartItem::class);
    }

    /**
     * Relazione tra prodotto e ordini (molti a molti)
     */
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
