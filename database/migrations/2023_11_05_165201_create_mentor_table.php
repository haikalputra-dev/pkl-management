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
        Schema::create('mentor', function (Blueprint $table) {
            $table->id();
            $table->integer('id_auth');
            $table->string('nama_mentor',50);
            $table->date('tgl_lahir');
            $table->string('alamat',50);
            $table->enum('jenis_kelamin',['pria','wanita']);
            $table->string('agama',50);
            $table->string('no_telp',20);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mentors');
    }
};
