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
        Schema::create('pinjam', function (Blueprint $table) {
                $table->id('id_pinjam'); 
                $table->date('tanggal_pinjam'); 
                $table->date('tanggal_maks_kembali'); 
                $table->date('tanggal_kembali')->nullable(); 
                $table->unsignedBigInteger('id_user');
                $table->unsignedBigInteger('id_anggota');
                $table->unsignedBigInteger('id_buku'); 
                $table->timestamps();
    
                // Menambahkan foreign key untuk tabel terkait ada
                $table->foreign('id_user')->references('id')->on('user')->onDelete('cascade');
                $table->foreign('id_anggota')->references('id')->on('anggota')->onDelete('cascade');
                $table->foreign('id_buku')->references('id')->on('buku')->onDelete('cascade');
        });
    }

    /**
     *Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjam');
    }
};
