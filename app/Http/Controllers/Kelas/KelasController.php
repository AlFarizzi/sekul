<?php

namespace App\Http\Controllers\Kelas;

use App\Models\ClassRoom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Repo\KelasRepository;

class KelasController extends Controller
{
    public $kelasRepo;

    public function __construct(KelasRepository $kelas)
    {
        $this->kelasRepo = $kelas;
    }
    // ------------------ KELAS --------------

    public function getKelas() {
        $class = $this->kelasRepo->getKelas();
        return view("content.admin.kelas.classes",compact("class"));
    }

    public function getPostKelas() {
        return view("content.admin.kelas.tambah");
    }

    public function postKelas(Request $request) {
        $request->validate([
            "nama_kelas" => ["required", "unique:class_rooms,class"]
        ]);
        $posted = $this->kelasRepo->postKelas($request->all());
        $posted === true ? Alert::success("Berhasil", "Kelas Berhasil Ditambahkan")
        : Alert::error("Error", "Kelas Gagal Ditambahkan");
        return redirect()->route("adminGetKelas");
    }

    public function getKelasMember(ClassRoom $class) {
        $students = $class->students;
        return view("content.admin.kelas.member",compact("students"));
    }

    public function getUpdateKelas(ClassRoom $class) {
        return view("content.admin.kelas.edit_kelas",compact("class"));
    }

    public function updateKelas(Request $request, ClassRoom $class) {
        $request->validate([
            "kelas" => ["required", "unique:class_rooms,class"]
        ]);
        $updated = $this->kelasRepo->updateKelas($request->all(),$class);
        $updated === true
        ? Alert::success("Berhasil", "Update Kelas Berhasil Dilakukan")
        : Alert::error("Error", "Update Kelas Gagal Dilakukan");
        return redirect()->route("adminGetKelas");
    }
}
