<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jedla', function (Blueprint $table) {
            $table->bigIncrements('jedlo_id');
            $table->integer('kategoria_id');
            $table->longText('nazov');
            $table->longText('popis');
            $table->longText('alergeny');
            $table->decimal('cena', 5, 2);

            $table->foreign('kategoria_id')->references('kategoria_id')->on('kategorie');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jedla');
    }
};
