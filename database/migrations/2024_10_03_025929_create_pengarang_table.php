<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('pengarang', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pengarang', 255);
            $table->string('no_telepon', 255);
            $table->string('email', 255);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengarang');
    }
};
