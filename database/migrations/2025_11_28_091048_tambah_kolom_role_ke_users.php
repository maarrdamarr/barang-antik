<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
// database/migrations/xxxx_tambah_kolom_role_ke_users.php
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('pengguna'); // nilai: admin, penjual, pengguna
            $table->string('nama_lengkap')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
