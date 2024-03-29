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
            $table->string('name',50);
            $table->string('username',50)->nullable();
            $table->string('email',50)->unique();
            $table->string('password',150);
            $table->enum('role', ['admin', 'mentor', 'siswa', 'staff', 'instansi','pembimbing']);
            $table->enum('status', ['aktif', 'inaktif'])->default('aktif');
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
