<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogPengajuan extends Model
{
    use HasFactory;
    public $table = "log_pengajuan";
    public $timestamps = false;
    protected $fillable =[
        'id_pengajuan','username','komentar','status_log'
    ];
}
