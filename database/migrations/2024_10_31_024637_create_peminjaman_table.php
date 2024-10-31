
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
            $table->string('buku', 255);
            $table->unsignedBigInteger('id_anggota'); // Foreign key untuk anggota
            $table->unsignedBigInteger('buku'); // Foreign key untuk anggota
            $table->string('status', 255);
            // Menambahkan foreign key untuk id_anggota
            $table->foreign('id_anggota')->references('id')->on('tb_anggota')->onDelete('cascade');
            $table->foreign('buku')->references('id')->on('buku')->onDelete('cascade');
            $table->timestamps();
        });
    }



    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
