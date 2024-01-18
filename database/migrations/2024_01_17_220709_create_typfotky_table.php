<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('typfotky', function (Blueprint $table) {
            $table->integer('typ_id')->primary();
            $table->string('nazov', 50);
        });

        DB::table('typfotky')->insert([
            ['typ_id' => 1, 'nazov' => 'jedla'],
            ['typ_id' => 2, 'nazov' => 'restauracia'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('typfotky');
    }
};
