<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Graduation extends Model
{
    use HasFactory;
    protected $fillable = [
        "nisn","nis","nama","role",
        "alamat","tempat_lahir","tanggal_lahir",
        "tahun_masuk","tahun_tamat"
    ];
}
