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
    Schema::create('barang', function (Blueprint $table) {
        $table->id();
        $table->string('judul');
        $table->text('deskripsi')->nullable();
        $table->decimal('harga_awal', 15, 2)->nullable();
        $table->string('foto')->nullable();
        $table->foreignId('kategori_id')->nullable()->constrained('kategori')->nullOnDelete();
        $table->foreignId('user_id')->constrained('users'); // pemilik/penjual
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
