<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembimbing extends Model
{
    use HasFactory;
    public $table = "pembimbing";
    public $timestamps = false;
    protected $fillable =[
        'nama_pembimbing','agama','alamat','no_telp','id_auth','jenis_kelamin','tgl_lahir','id_instansi'
    ];
}
