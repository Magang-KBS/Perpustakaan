<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->text('payload');
            $table->integer('last_activity');
            $table->unsignedBigInteger('user_id')->nullable(); // Kolom user_id yang diperlukan
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sessions'); // Menghapus tabel jika rollback
    }
};
