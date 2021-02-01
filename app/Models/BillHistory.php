<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        "tanggal", "bulan", "tahun", "user_id", "officer_id",
        "spm", "spp", "total_bayar", "sisa_hutang"
    ];
    protected $with = ['user','officer'];
    public function user() {
        return $this->belongsTo(User::class,'user_id');
    }

    public function officer() {
        return $this->belongsTo(User::class,'officer_id');
    }

}
