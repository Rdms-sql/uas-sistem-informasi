<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id('id_peminjaman');
            $table->unsignedBigInteger('id_anggota');
            $table->unsignedBigInteger('id_admin');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');

            $table->foreign('id_anggota', 'fk_peminjaman_anggota')
                ->references('id_anggota')->on('anggota')
                ->onDelete('restrict')->onUpdate('cascade');

            $table->foreign('id_admin', 'fk_peminjaman_admin')
                ->references('id_admin')->on('admin')
                ->onDelete('restrict')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};