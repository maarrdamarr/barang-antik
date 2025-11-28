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
    Schema::create('lelangs', function (Blueprint $table) {
        $table->id();
        $table->foreignId('barang_id')->constrained('barang')->cascadeOnDelete();
        $table->decimal('harga_awal',15,2);
        $table->dateTime('mulai');
        $table->dateTime('selesai');
        $table->enum('status',['draf','aktif','selesai'])->default('draf');
        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lelangs');
    }
};
