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
        Schema::create('tikets', function (Blueprint $table) {
            $table->id();
            $table->string('no_tiket');
            $table->date('tanggal');
            $table->bigInteger('id_kategori');
            $table->bigInteger('id_unit');
            // $table->string('lokasi');
            $table->text('kerusakan');
            $table->string('pemohon');
            $table->bigInteger('id_status')->default(1);
            $table->bigInteger('id_progres')->nullable();
            $table->bigInteger('id_user'); //Ini untuk triger user pemohon
            $table->bigInteger('id_karyawan')->nullable(); //Ini adalah untuk petugas IT
            $table->string('prioritas')->nullable();
            $table->integer('selesai')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tikets');
    }
};
