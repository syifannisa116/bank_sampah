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
        Schema::create('setoran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_nasabah')
                ->constrained('nasabah', 'id')
                ->cascadeOnDelete();
            $table->foreignId('id_petugas')
                ->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('id_jenis_sampah')
                ->constrained('jenis_sampah', 'id')
                ->restrictOnDelete();
            $table->foreignId('id_event_detail')
                ->nullable()
                ->constrained('event_harga_detail', 'id')
                ->nullOnDelete();
            $table->string('nomor_transaksi')->unique();
            $table->dateTime('tgl_setoran');
            $table->decimal('berat', 12, 3);
            $table->decimal('harga_per_kg', 15, 2);
            $table->decimal('nilai_setoran', 15, 2);
            $table->string('status')->default('menunggu');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setorans');
    }
};
