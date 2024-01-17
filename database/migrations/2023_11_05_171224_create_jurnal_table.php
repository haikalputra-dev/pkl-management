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
        Schema::create('jurnals', function (Blueprint $table) {
            $table->id();
            $table->integer('id_siswa');
            $table->integer('id_mentor');
            $table->text('keterangan');
            $table->string('foto_jr',100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurnal');
    }
};
