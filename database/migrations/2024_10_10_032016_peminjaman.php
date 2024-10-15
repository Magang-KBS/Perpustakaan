<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->string('tgl_pinjam', 255);
            $table->string('tgl_max_pinjam', 255);
            $table->string('tgl_kembali', 255);
            $table->unsignedBigInteger('id_anggota'); // Foreign key untuk anggota
            $table->unsignedBigInteger('id_petugas'); // Foreign key untuk petugas
            $table->string('status', 255);
            $table->timestamps();
        });
    }



    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
