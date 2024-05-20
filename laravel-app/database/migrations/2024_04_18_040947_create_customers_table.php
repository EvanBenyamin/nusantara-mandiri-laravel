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
            $table->foreignId('user_id');
            $table->foreignId('employment_id');
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string('alamat');
            $table->string('alasan');
            $table->string('telepon');
            $table->string('pendapatan');
            $table->string('lama_angsuran');
            $table->unsignedInteger('pinjaman');
            $table->string('kelengkapan_berkas');
            $table->float('skor')->nullable();
            $table->string('status_pembayaran')->default(true);
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
