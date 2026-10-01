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
        Schema::create('event_harga_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_event')
                ->constrained('event_harga', 'id')
                ->cascadeOnDelete();
            $table->foreignId('id_jenis_sampah')
                ->constrained('jenis_sampah', 'id')
                ->cascadeOnDelete();
            $table->decimal('harga_event', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_harga_details');
    }
};
