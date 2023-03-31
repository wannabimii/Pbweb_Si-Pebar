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
        Schema::create('pinjam', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peminjam')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('barang')->references('id')->on('barang')->onDelete('cascade');
            $table->integer('jumlah');
            $table->dateTime('tgl_pinjam')->useCurrent();
            $table->dateTime('tgl_kembali')->useCurrent();
            $table->string('surat');
            $table->enum('status', ['pending', 'pakai', 'selesai']);
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjam');
    }
};