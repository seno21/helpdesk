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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('divisi')->nullable();
            $table->string('kategori')->nullable();
            $table->integer('id_prioritas');
            $table->timestamps();
        });

        // Schema::table('units', function (Blueprint $table) {
        //     $table->foreign('id_prioritas')->references('id')->on('prioritas')->cascadeOnUpdate()->cascadeOnDelete();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
