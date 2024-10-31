<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            $table->string('kode_buku', 255);
            $table->string('judul', 255);
            $table->string('kategori', 255);
            $table->string('pengarang', 255);
            $table->string('penerbit', 255);
            $table->string('tahun_terbit', 255);
            $table->string('stok', 255);
            $table->foreignId('pengarang_id')->constrained()->onDelete('cascade');
            $table->foreignId('penerbit_id')->constrained()->onDelete('cascade');
            $table->timestamps('');
        });
    }



    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
