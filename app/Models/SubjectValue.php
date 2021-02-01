<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectValue extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id","guru_id","mapel_id","class_id","nilai","tahun"
    ];

    public function class() {
        return $this->belongsTo(ClassRoom::class,'class_id');
    }

    public function subject() {
        return $this->belongsTo(Subject::class,'mapel_id');
    }

    public function user() {
        return $this->belongsTo(User::class,'user_id');
    }

}
