<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id","class_id","mapel_id",
        "nilai_teori","nilai_praktek","nilai_sikap","rata","tahun",
        "semester"
    ];

    public function user() {
        return $this->belongsTo(User::class,'user_id');
    }

    public function kelas() {
        return $this->belongsTo(ClassRoom::class,'class_id');
    }

    public function subject() {
        return $this->belongsTo(Subject::class,'mapel_id');
    }

}
