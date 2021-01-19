<?php

namespace App\Http\Controllers\Repo;

use App\Models\User;
use App\Models\Student;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function addUser($request) {
        $user = User::create([
            "nama" => $request["nama"],
            "username" => $request["username"],
            "role_id" => $request["role_id"],
            "password" => bcrypt($request["password"]),
            "alamat" => $request["alamat"],
            "tempat_lahir" => $request["tempat_lahir"],
            "tanggal_lahir" => $request["tanggal_lahir"],
            "photo_profile" => $request["photo_profile"]
        ]);
            return $user;
    }

    public function addSiswa($request){
        $user = $this->addUser($request);
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

    public function updateUser($student,$request) {
        $user = $student->user->update([
            "username" => $request["username"],
            "nama" => $request["nama"],
            "tempat_lahir" => $request["tempat_lahir"],
            "tanggal_lahir" => $request["tanggal_lahir"]
        ]);
        return $user;
    }

    public function updateSiswa($student,$request) {
        $siswa = $this->updateUser($student,$request);
        if($siswa) {
            $student->update([
                "nisn" => $request["nisn"],
                "nis" => $request["nis"],
                "classs_id" => $request["class"],
            ]);
        }
    }
}
