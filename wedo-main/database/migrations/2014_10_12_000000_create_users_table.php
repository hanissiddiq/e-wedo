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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama',255)->nullable();
            $table->string('tempat_lahir',50)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('email',50)->nullable();
            $table->string('no_hp',20)->nullable();
            $table->string('alamat',255)->nullable();
            $table->string('foto',255)->nullable();
            $table->string('password',255)->nullable();
            $table->string('role',255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
