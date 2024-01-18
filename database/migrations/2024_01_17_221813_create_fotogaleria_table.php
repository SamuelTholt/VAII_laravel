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
        Schema::create('fotogaleria', function (Blueprint $table) {
            $table->bigIncrements('foto_id');
            $table->integer('typ_id');
            $table->longText('nazov');
            $table->binary('obrazok');

            $table->foreign('typ_id')->references('typ_id')->on('typfotky');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fotogaleria');
    }
};
