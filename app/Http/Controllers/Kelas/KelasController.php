<?php

namespace App\Http\Controllers\Kelas;

use App\Models\ClassRoom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Repo\KelasRepository;

class KelasController extends Controller
{
    // ------------------ KELAS --------------

    public function getKelas() {
        $repo = new KelasRepository();
        $class = $repo->getKelas();
        return view("content.admin.kelas.classes",compact("class"));
    }

    public function getPostKelas() {
        return view("content.admin.kelas.tambah");
    }

    public function postKelas(Request $request) {
        $request->validate([
            "nama_kelas" => ["required", "unique:class_rooms,class"]
        ]);
        $repo = new KelasRepository();
        $repo->postKelas($request->all());
        return redirect()->route("adminGetKelas");
    }

    public function getKelasMember(ClassRoom $class) {
        $students = $class->students;
        return view("content.admin.kelas.member",compact("students"));
    }
}
