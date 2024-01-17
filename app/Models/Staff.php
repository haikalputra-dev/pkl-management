<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    public $table = "staff";
    public $timestamps = false;
    protected $fillable =[
        'nama_staff','agama','alamat','no_telp','id_auth','jenis_kelamin','tgl_lahir',
    ];
}
