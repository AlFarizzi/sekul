<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dropout extends Model
{
    use HasFactory;
    protected $fillable = [
        "nama_siswa","nisn","nis",
        "tanggal_dropout", "deskripsi"
    ];
}
