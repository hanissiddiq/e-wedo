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
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('nama',255)->nullable();
            $table->string('desa',255)->nullable();
            $table->string('kecamatan',255)->nullable();
            $table->string('kabupaten',255)->nullable();
            $table->string('provinsi',255)->nullable();
            $table->string('alamat',255)->nullable();
            $table->string('foto',255)->nullable();
            $table->string('id_user',11)->nullable();
            $table->string('status_pengajuan',255)->nullable();
            $table->string('hidden',255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
