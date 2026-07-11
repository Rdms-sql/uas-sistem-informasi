<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detail_peminjaman', function (Blueprint $table) {
            $table->id('id_detail');
            $table->unsignedBigInteger('id_peminjaman');
            $table->unsignedBigInteger('id_buku');
            $table->integer('jumlah');

            $table->foreign('id_peminjaman', 'fk_detail_peminjaman')
                ->references('id_peminjaman')->on('peminjaman')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('id_buku', 'fk_detail_buku')
                ->references('id_buku')->on('buku')
                ->onDelete('restrict')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_peminjaman');
    }
};