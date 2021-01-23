<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        "tanggal_bayar", "user_id", "officer_id",
        "spm", "spp", "total_bayar", "sisa_hutang"
    ];
}
