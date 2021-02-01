<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    use HasFactory;
    protected $fillable = ["class"];
    // protected $with = ['students'];
    public function students() {
        return $this->hasMany(Student::class, 'class_id');
    }

    public function subjectValues() {
        return $this->hasMany(SubjectValue::class,'class_id');
    }

}
