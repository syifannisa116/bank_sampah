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
        Schema::create('mutasi_saldo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_nasabah')
                ->constrained('nasabah', 'id')
                ->cascadeOnDelete();
            $table->foreignId('id_setoran')
                ->nullable()->constrained('setoran', 'id')->nullOnDelete();
            $table->foreignId('id_penarikan')
                ->nullable()->constrained('penarikan', 'id')->nullOnDelete();
            $table->string('jenis_mutasi');
            $table->decimal('jumlah', 15, 2);
            $table->decimal('saldo_sebelum', 15, 2);
            $table->decimal('saldo_sesudah', 15, 2);
            $table->dateTime('tgl_mutasi');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mutasi_saldos');
    }
};
