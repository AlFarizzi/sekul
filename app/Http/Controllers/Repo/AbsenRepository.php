<?php

namespace App\Http\Controllers\Repo;

use App\Models\User;
use App\Models\Absent;
use App\Http\Controllers\Controller;

class AbsenRepository extends Controller
{
    public function getAbsen($class,$guru,$h = null, $d = null) {
        $officer = User::where("id",$guru)->get()[0];
        $absents = null;
        $query = Absent::where("guru_id",$officer->id)
                ->where("class_id",$class->id)
                ->where("tanggal", $d === null ? date("Y-m-d") : $d);
        if($h !== null) {
            $absents = $query->where('jam',$h)->get();
        } else {
            $absents = $query->get();
        }
        $hours = Absent::where('class_id', $class->id)->where("guru_id",$officer->id)
                        ->where("tanggal",$d === null ? date("Y-m-d") : $d)->distinct("jam")->get("jam");
        return [$absents,$hours];
    }
}
