<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengembalian', function (Blueprint $table) {
            $table->id('id_pengembalian');
            $table->unsignedBigInteger('id_peminjaman');
            $table->date('tanggal_dikembalikan');
            $table->decimal('denda', 10, 2)->default(0.00);
            $table->string('status', 20);

            $table->foreign('id_peminjaman', 'fk_pengembalian_peminjaman')
                ->references('id_peminjaman')->on('peminjaman')
                ->onDelete('restrict')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengembalian');
    }
};