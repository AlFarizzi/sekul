<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        "nisn","nis","user_id","tahun_masuk","tahun_tamat","class_id",
        "nama_ayah", "nama_ibu"
    ];
    protected $with = ['user','class'];
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function class() {
        return $this->belongsTo(ClassRoom::class, 'class_id');
    }
}
