<?php
// File: database/migrations/xxxx_xx_xx_xxxxxx_create_orders_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            // La colonna id è automaticamente creata come PRIMARY KEY
            $table->id();
            
            // Colonna user_id che è una chiave esterna che punta alla tabella 'users'
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            // Colonna per il totale dell'ordine
            $table->decimal('total', 8, 2);
            
            // Stato dell'ordine: pending, completed, shipped, canceled
            $table->enum('status', ['pending', 'completed', 'shipped', 'canceled'])->default('pending');
            
            // Timestamps per tracciare quando è stato creato e aggiornato l'ordine
            $table->timestamps();
        });
    }

    public function down()
    {
        // Per rimuovere la tabella quando viene eseguito il rollback
        Schema::dropIfExists('orders');
    }
}
