<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = ["mapel"];
    protected $dates = ["deleted_at"];

    public function subjectValue() {
        return $this->hasMany(SubjectValue::class,'mapel_id');
    }

    public function reports() {
        return $this->hasMany(Report::class,'mapel_id');
    }

}
