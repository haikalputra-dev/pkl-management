<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    use HasFactory;
    public $table = "jurnal";
    public $timestamps = false;
    protected $fillable =[
        'id',
        'id_siswa',
        'id_mentor',
        'keterangan',
        'foto_jr',
    ];
}
