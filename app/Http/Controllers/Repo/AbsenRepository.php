<?php

namespace App\Http\Controllers\Repo;

use App\Models\User;
use App\Models\Absent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AbsenRepository extends Controller
{

    public function getAbsen($class,$guru,$h = null) {
        $officer = User::where("id",$guru)->get()[0];
        $absents = null;
        $query = Absent::where("guru_id",$officer->id)
                ->where("class_id",$class->id)
                ->where("tanggal", date("Y-m-d"));
        if($h !== null) {
            $absents = $query->where('jam',$h)->get();
        } else {
            $absents = $query->get();
        }
        $hours = Absent::where('class_id', $class->id)->where("guru_id",$officer->id)
                        ->where("tanggal",date("Y-m-d"))->distinct("jam")->get("jam");
        return [$absents,$hours];
    }
}
