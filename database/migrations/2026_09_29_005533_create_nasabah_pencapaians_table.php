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
        Schema::create('nasabah_pencapaian', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_nasabah')
                ->constrained('nasabah', 'id')
                ->cascadeOnDelete();

            $table->foreignId('id_pencapaian')
                ->constrained('pencapaian', 'id')
                ->cascadeOnDelete();

            $table->date('tgl_diperoleh')->nullable();
            $table->unsignedInteger('progress')->default(0);
            $table->string('status')->default('proses');
            $table->timestamps();

            $table->unique(['id_nasabah', 'id_pencapaian']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nasabah_pencapaians');
    }
};
