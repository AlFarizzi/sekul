<?php

namespace App\Http\Controllers\Repo;

use App\Models\User;
use App\Models\Absent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AbsenRepository extends Controller
{

    public function getAbsen($class,$guru) {
        $officer = User::where("id",$guru)->get()[0];
        $absents = Absent::where("guru_id",$officer->id)
                    ->where("class_id",$class->id)
                    ->where("tanggal", date("Y-m-d"))->get();
        return $absents;
    }
}
