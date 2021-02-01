<?php

namespace App\Http\Controllers\Repo;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\SubjectValue;
use Illuminate\Http\Request;

class SubjectRepository extends Controller
{
    public function getSubjects() {
        return Subject::get();
    }

    public function inputNilai($user_id,$guru_id,$class_id,$mapel_id,$tahun,$nilai) {
        SubjectValue::create([
            "user_id" => $user_id,
            "guru_id" => $guru_id,
            "class_id" => $class_id,
            "mapel_id" => $mapel_id,
            "tahun" => $tahun,
            "nilai" => $nilai
        ]);
    }

    public function getDetailNilai($mapel,$tahun,$class,$user) {
        $values = null;
        if($mapel == null || $tahun == null || $mapel == null && $tahun == null) {
            $values = SubjectValue::where("class_id",$class)
                    ->where("user_id",$user)->where("tahun",date("Y"))->get();
        } else {
            $values =   $values = SubjectValue::where("class_id",$class)
            ->where("user_id",$user)->where("tahun",$tahun)
            ->where("mapel_id", $mapel)->get();
        }
        return $values;
    }

}
