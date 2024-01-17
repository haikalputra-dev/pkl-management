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
        //
        Schema::create('absensi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->enum('keterangan', ['Masuk', 'Alpa', 'Telat', 'Sakit',]);
            $table->date('tanggal');
            $table->time('jam_masuk')->nullable();
            $table->string('foto_in',100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //S
        Schema::dropIfExists('absensi');
    }
};
