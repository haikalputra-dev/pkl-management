<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;
    public $table = "pengajuan";
    public $timestamps = false;
    protected $fillable =[
        'nama_pembimbing'
    ];
}
