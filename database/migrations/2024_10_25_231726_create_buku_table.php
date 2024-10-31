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
        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            $table->string('kode_buku');
            $table->string('judul',255);
            $table->unsignedBigInteger('id_kategori');
            $table->unsignedBigInteger('id_pengarang');
            $table->integer('tahun_terbit');
            $table->string('sampul_buku')->nullable();
            $table->integer('stok');
            $table->timestamps();

            $table->foreign('id_kategori')->references('id')->on('kategori')->onDelete('cascade');
            $table->foreign('id_pengarang')->references('id')->on('pengarang')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
