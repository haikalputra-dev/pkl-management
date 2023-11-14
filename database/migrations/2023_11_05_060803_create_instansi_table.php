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
        Schema::create('instansi', function (Blueprint $table) {
            $table->id();
            $table->integer('id_auth');
            $table->string('nama_instansi',50);
            $table->string('npsn',15);
            $table->enum('jenis_sekolah',['negeri','swasta'])->default('negeri');
            $table->string('alamat',100);
            $table->string('telepon',15);
            $table->string('email',15);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instansi');
    }
};
