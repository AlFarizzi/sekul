<?php

namespace App\Http\Controllers\Graduation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Repo\SiswaRepository;

class GraduationController extends Controller
{
    // --------------- Graduation System ---------------------------

    public function getKelulusan() {
        $repo = new SiswaRepository();
        $students = $repo->getWillGraduate();
        return view("content.admin.siswa.graduate",compact("students"));
    }

    public function postKelulusan() {
        $repo = new SiswaRepository();
        $repo->postGraduation();
        Alert::success("Berhasil", "Siswa Kelulusan Tahun Ini Telah Dilaksanakan Pada ". date("m/d/Y H:i:s"));
        return redirect()->route("adminDataSiswa");
    }
}
