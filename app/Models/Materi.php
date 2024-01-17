<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = "materi";
    protected $fillable =[
        'id',
        'id_siswa',
        'id_mentor',
        'keterangan',
        'file_name',
    ];
}
