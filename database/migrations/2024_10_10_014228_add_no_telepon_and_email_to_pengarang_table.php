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
        Schema::table('pengarang', function (Blueprint $table) {
            $table->string('email')->nullable();
            $table->string('no_telepon')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengarang', function (Blueprint $table) {
                    $table->dropColumn(['email', 'no_telepon']);

        });
    }
};
