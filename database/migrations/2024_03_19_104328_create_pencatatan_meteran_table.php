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
        Schema::create('pencatatan_meteran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelanggan_id');
            $table->foreignId('petugas_id');
            $table->integer('bulan');
            $table->integer('tahun');
            $table->integer('angka_meteran');
            $table->string('foto');
            $table->unique(['bulan', 'tahun', 'pelanggan_id']);
            $table->foreign('pelanggan_id')->references('id')->on('pelanggan')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('petugas_id')->references('id')->on('petugas')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pencatatan_meteran');
    }
};
