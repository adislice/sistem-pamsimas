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
        Schema::create('tagihan_pembayaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelanggan_id');
            $table->integer('bulan');
            $table->integer('tahun');
            $table->integer('jumlah_pemakaian');
            $table->decimal('tarif_permeter', 10, 2);
            $table->decimal('total_tagihan', 10, 2);
            $table->date('tgl_batas_bayar');
            $table->enum('status_pembayaran', ['unpaid', 'paid'])->default('unpaid');
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
        Schema::dropIfExists('tagihan_pembayaran');
    }
};
