<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absent extends Model
{
    use HasFactory;
    protected $fillable = ["user_id", "guru_id", "class_id", "tanggal", "jam", "keterangan"];
    protected $with = ['user','guru'];
    public function user() {
        return $this->belongsTo(User::class,'user_id');
    }

    public function guru() {
        return $this->belongsTo(User::class,'guru_id');
    }

}
