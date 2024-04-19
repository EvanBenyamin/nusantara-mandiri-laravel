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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('alasan');
            $table->string('status_kepegawaian');
            $table->string('pendapatan');
            $table->string('lama_angsuran');
            $table->string('kelengkapan_berkas');
            $table->string('pinjaman');
            $table->timestamp('published_at')->nullable() ;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
