<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    public $table = "siswa";
    public $timestamps = false;
    protected $fillable =[
        'nama_siswa','nis','alamat','no_telp','id_auth','id_instansi','jurusan','tgl_lahir','agama'
    ];
    
}
