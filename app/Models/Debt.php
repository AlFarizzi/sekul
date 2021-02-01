<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debt extends Model
{
    use HasFactory;
    protected $fillable = ["user_id", "tahun", "spp", "spm", "total"];
    protected $with = ['user'];
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }



}
