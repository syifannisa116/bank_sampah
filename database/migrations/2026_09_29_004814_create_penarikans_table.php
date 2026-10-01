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
        Schema::create('penarikan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_nasabah')
                ->constrained('nasabah', 'id')
                ->cascadeOnDelete();
            $table->foreignId('id_petugas')
                ->nullable()->constrained('users')->nullOnDelete();
            $table->string('nomor_transaksi')->unique();
            $table->decimal('nominal', 15, 2);
            $table->dateTime('tgl_pengajuan');
            $table->dateTime('tgl_diproses')->nullable();
            $table->string('metode_penarikan');
            $table->string('nama_bank_ewallet')->nullable();
            $table->string('nomor_tujuan')->nullable();
            $table->string('status')->default('menunggu');
            $table->text('catatan')->nullable();
            $table->string('bukti_transfer')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penarikans');
    }
};
