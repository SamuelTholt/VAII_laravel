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
        Schema::create('kategorie', function (Blueprint $table) {
            $table->integer('kategoria_id')->primary();
            $table->string('nazov', 50);
        });

        DB::table('kategorie')->insert([
            ['kategoria_id' => 1, 'nazov' => 'polievky'],
            ['kategoria_id' => 2, 'nazov' => 'hlavneJedla'],
            ['kategoria_id' => 3, 'nazov' => 'prilohy'],
            ['kategoria_id' => 4, 'nazov' => 'omacky'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategorie');
    }
};
