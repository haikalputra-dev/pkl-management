<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tim extends Model
{
    use HasFactory;
    public $table = "tim";
    public $timestamps = false;
    protected $fillable =[
        'id_instansi','id_pembimbing','id_siswa'
    ];
}
