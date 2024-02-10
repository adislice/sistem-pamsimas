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
        Schema::create('tagihan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelanggan_id');
            $table->integer('bulan');
            $table->integer('tahun');
            $table->integer('penggunaan_air');
            $table->decimal('harga_permeter', 10, 2);
            $table->decimal('tagihan', 10, 2);
            $table->date('tgl_batas_bayar');
            $table->foreignId('tarif_id');
            $table->foreign('tarif_id')->references('id')->on('tarif')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('pelanggan_id')->references('id')->on('pelanggan')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
            $table->unique(['pelanggan_id', 'bulan', 'tahun']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tagihan');
    }
};
