<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = ["mapel"];

    public function subjectValue() {
        return $this->hasMany(SubjectValue::class,'mapel_id');
    }
}
