<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    use HasFactory;
    // public factory()->count(5)->create();
    public $table = "instansi";
    public $timestamps = false;
    protected $fillable =[
        'nama_instansi'
    ];
    
}
