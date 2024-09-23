<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Svatky
        Schema::create('vacation', function (Blueprint $table) {
            // Id
            $table->id();
            // Jazyk
            $table->string('lang', 3);
            // Datum
            $table->string('date', 10);
            // Nazev
            $table->string('name', 100);
            
            $table->timestamps();
        });
        
        // Pracovni dny
        Schema::create('work_day', function (Blueprint $table) {
            $table->id();
            // Jazyk
            $table->string('lang', 3);
            // Den v tydnu
            $table->tinyInteger('day');
            // Pracovni
            $table->boolean('workday');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacation');
        Schema::dropIfExists('work_day');
    }
};
