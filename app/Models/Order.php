<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // I campi che sono "mass assignable" (che possono essere assegnati in massa)
    protected $fillable = ['user_id', 'total', 'status'];

    /**
     * Relazione tra ordine e utente (un ordine appartiene a un utente)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relazione tra ordine e prodotti (molti a molti)
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
