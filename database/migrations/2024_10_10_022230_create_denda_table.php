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
        Schema::create('denda', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pinjam'); // Kolom untuk ID peminjaman
            $table->unsignedBigInteger('id_anggota'); // Kolom untuk ID anggota
            $table->decimal('jumlah_denda', 8, 2); // Jumlah denda dengan dua tempat desimal
            $table->text('notes')->nullable(); // Catatan tambahan, nullable jika tidak ada
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('denda');
    }
};
