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
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string('alamat');
            $table->string('email');
            $table->string('keperluan_meminjam');
            $table->string('telepon');
            $table->string('status_kepegawaian');
            $table->string('pendapatan');
            $table->string('lama_angsuran');
            $table->integer('jumlah_pinjaman');
            $table->string('kelengkapan_berkas');
            $table->float('skor');
            $table->boolean('status_pengajuan')->default(false);  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};
