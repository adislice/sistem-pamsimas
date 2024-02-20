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
        Schema::create('penggunaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelanggan_id');
            $table->integer('bulan');
            $table->integer('tahun');
            $table->integer('mt_awal');
            $table->integer('mt_akhir');
            $table->integer('pemakaian');
            $table->decimal('harga_permeter', 10, 2);
            $table->decimal('tagihan', 10, 2);
            $table->date('tgl_batas_bayar');
            $table->foreignId('tarif_id');
            $table->foreign('tarif_id')->references('id')->on('tarif')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('pelanggan_id')->references('id')->on('pelanggan')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penggunaan');
    }
};
