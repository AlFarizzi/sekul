<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DebtSetting extends Model
{
    use HasFactory;
    protected $fillable = ["spp","spm","tahun","total"];
}
