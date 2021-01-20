<?php

namespace App\Http\Controllers\Repo;

use App\Models\User;
use App\Models\Student;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\Graduation as JobsGraduation;
use App\Models\Graduation;

class SiswaRepository extends Controller
{
    public function getSiswa(?int $kelas = null) {
        $classes = ClassRoom::get();
        $students = null;
        if ($kelas === null) {
            $students = Student::with("user")->where("class_id", 1)->get();
        } else {
            $students = Student::with("user")->where("class_id",$kelas)->get();
        }
        return [$students,$classes];
    }

    public function addSiswa($request){
        $repo = new UserRepository();
        $user = $repo->addUser($request);
        $student = Student::create([
            "nisn" => $request["nisn"],
            "nis" => $request["nis"],
            "tahun_masuk" => Date("Y"),
            "tahun_tamat" => Date("Y") + 3,
            "user_id" => $user["id"],
            "class_id" => $request["class"]
        ]);
    }

    public function deleteSiswa($request) {
        $request->user->delete();
        $request->delete();
    }

    public function updateSiswa($student,$request) {
        $repo = new UserRepository();
        $siswa = $repo->updateUser($student->user,$request);
        if($siswa) {
            $student->update([
                "nisn" => $request["nisn"],
                "nis" => $request["nis"],
                "classs_id" => $request["class"],
            ]);
        }
    }

    public function getWillGraduate() {
        return Student::with('user')->where("tahun_tamat",Date("Y"))->get();
    }

    public function postGraduation() {
        $students = Student::with('user','role')->where('tahun_tamat',Date("Y"))->get();
        dispatch(new JobsGraduation($students));
    }

}
