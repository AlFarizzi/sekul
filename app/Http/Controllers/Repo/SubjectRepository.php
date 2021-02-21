<?php

namespace App\Http\Controllers\Repo;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\SubjectValue;

class SubjectRepository extends Controller
{
    public function getSubjects() {
        return Subject::get();
    }

    public function inputNilai($user_id,$guru_id,$class_id,$tahun,$request) {

        $created = SubjectValue::create([
            "user_id" => $user_id,
            "guru_id" => $guru_id,
            "class_id" => $class_id,
            "mapel_id" => $request["mapel"],
            "tahun" => $tahun,
            "nilai" => $request["nilai"],
            "semester" => $request["semester"],
            "kategori" => $request["kategori"]
        ]);
        return $created;
    }

    public function getDetailNilai($mapel,$semester,$class,$user) {
        $values = null;
        if($mapel === null && $semester == null) {
            $values = SubjectValue::where("class_id",$class)
                    ->where("user_id",$user)->where("tahun",date("Y"))->get();
        } else if($mapel === null) {
            $values = SubjectValue::where("user_id",$user)
            ->where("semester",$semester)->get();
        } else if($semester === null) {
            $values = SubjectValue::where("user_id",$user)
            ->where("mapel_id",$mapel)->get();
        } else {
            $values = SubjectValue::where("user_id",$user)
            ->where("mapel_id",$mapel)->where("semester",$semester)->get();
        }
        return $values;
    }

}
