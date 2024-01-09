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
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pembimbing');
            $table->integer('id_tim');
            $table->integer('id_staff');
            $table->string('dokumen',100);
            $table->enum('status_pengajuan',['Draft','Diserahkan','Ditunda','Diterima','Ditolak'])->default('Draft');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan');
    }
};
