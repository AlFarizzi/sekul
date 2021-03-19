<?php

namespace App\Http\Controllers\Repo;

use App\Models\User;
use App\Models\Dropout;
use App\Models\Student;
use App\Models\ClassRoom;
use App\Models\Graduation;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Jobs\Graduation as JobsGraduation;

class SiswaRepository extends Controller
{
    public function getAllSiswa() {
        return Student::get();
    }

    public function getSiswa(?int $kelas = null) {
        // $classes = ClassRoom::get();
        $students = null;
        if ($kelas === null) {
            $students = $this->getAllSiswa();
        } else {
            $students = Student::where("class_id",$kelas)->get();
        }
        return $students;
    }

    public function addSiswa($request){
        $repo = new UserRepository();
        $user = $repo->addUser($request);
        $student = Student::create([
            "nisn" => $request["nisn"],
            "nis" => $request["nis"],
            "nama_ayah" => $request["ayah"],
            "nama_ibu" => $request["ibu"],
            "tahun_masuk" => Date("Y"),
            "tahun_tamat" => Date("Y") + 3,
            "user_id" => $user["id"],
            "class_id" => $request["class"]
        ]);
        $paymentRepo = new PaymentRepository();
        $paymentRepo->createInstance($user);
        $student->id !== 0
        ? Alert::success("Berhasil", "Siswa Berhasil Ditambahkan")
        : Alert::error("Error", "Siswa Gagal Ditambahkan");
    }

    public function deleteSiswa($request) {
        // $request->user->debt->delete();
        // foreach ($request->user->absents as $a) {
        //     $a->delete();
        // }
        // foreach ($request->user->reports as $r) {
        //     $r->delete();
        // }
        // foreach ($request->user->subjectValues as $s) {
        //     $s->delete();
        // }
        $request->user->delete();
        // $request->delete();
        Alert::success("Berhasil", "Data Ini Berhasil Dihapus");
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
            Alert::success("Berhasil", "Data Siswa Berhasil Diupdate");
        }
    }

    public function getWillGraduate() {
        return Student::where("tahun_tamat",Date("Y"))->get();
    }

    public function postGraduation() {
        $students = Student::where('tahun_tamat',Date("Y"))->get();
        dispatch(new JobsGraduation($students));
    }

    public function dropoutSystem($request) {
        $user = User::where('id',$request["id"])->get()[0];
        Dropout::create([
            "nama_siswa" => $user->nama,
            "nisn" => $user->student->nisn,
            "nis" => $user->student->nis,
            "tanggal_dropout" => $request["tanggal_dropout"],
            "deskripsi" => $request["deskripsi"]
        ]);
        $this->deleteSiswa($user->student);
    }

    public function getArsipDropout() {
        return Dropout::get();
    }

    public function getArsipGraduation() {
        return Graduation::orderBy("tahun_tamat", "ASC")->get();
    }

}
