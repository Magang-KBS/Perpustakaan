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
        Schema::create('tb_buku', function (Blueprint $table) {
            $table->id('id_buku');
            $table->string('kode_buku', 255);
            $table->unsignedBigInteger('id_penerbit');
            $table->unsignedBigInteger('id_pengarang'); 
            $table->unsignedBigInteger('id_kategori');
            $table->string('judul', 255);
            $table->integer('tahun_terbit');
            $table->integer('stok');
            $table->string('kategori');

            $table->timestamps();

            $table->foreign('id_penerbit')->references('id')->on('penerbit')->onDelete('cascade');
            $table->foreign('id_pengarang')->references('id')->on('pengarang')->onDelete('cascade');
            $table->foreign('id_kategori')->references('id')->on('kategori')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_buku');
    }
};
