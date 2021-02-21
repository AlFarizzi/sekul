<?php

namespace App\Http\Controllers\Repo;

use App\Models\Report;
use App\Http\Controllers\Controller;

class RaporRepository extends Controller
{
    public function inputNilaiRapor($request,$student) {
        $created = Report::create([
            "user_id" => $student->user_id,
            "class_id" => $student->class_id,
            "mapel_id" => $request["mapel"],
            "nilai_teori" => $request["nilai_teori"],
            "nilai_praktek" => $request["nilai_praktek"],
            "nilai_sikap" => $request["nilai_sikap"],
            "rata" => floor(($request["nilai_sikap"] + $request["nilai_teori"] +
                        $request["nilai_praktek"]
                    ) / 3),
            "tahun" => date("Y"),
            "semester" => $request["semester"]
        ]);
        return $created;
    }
}
