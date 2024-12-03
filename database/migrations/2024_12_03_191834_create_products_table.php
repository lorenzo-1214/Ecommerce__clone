<?php

// File: database/migrations/xxxx_xx_xx_xxxxxx_create_products_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            // La colonna id è automaticamente creata come PRIMARY KEY
            $table->id();
            
            // Nome del prodotto
            $table->string('name');
            
            // Descrizione del prodotto
            $table->text('description');
            
            // Prezzo del prodotto
            $table->decimal('price', 8, 2);
            
            // Immagine del prodotto, la colonna può essere null
            $table->string('image')->nullable();
            
            // Timestamps per creare 'created_at' e 'updated_at'
            $table->timestamps();
        });
    }

    public function down()
    {
        // Per rimuovere la tabella quando viene eseguito il rollback
        Schema::dropIfExists('products');
    }
}
