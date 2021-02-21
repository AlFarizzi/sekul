<?php

namespace App\Http\Controllers\Dropout;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Repo\SiswaRepository;

class DropoutController extends Controller
{
     // ---------- Dropout System -----------

     public function getDropout() {
        $repo = new SiswaRepository();
        $students = $repo->getAllSiswa();
        return view("content.admin.siswa.dropout",compact("students"));
    }

    public function formDropout(Student $student) {
        return view("content.admin.siswa.dropout_form",compact("student"));
    }

    public function postDropout(Request $request) {
        // dd($request->all());
        $repo = new SiswaRepository();
        $repo->dropoutSystem($request->all());
        Alert::success("Berhasil", "Siswa Berhasil Didropout Pada ". date("m/d/Y H:i:s"));
        return redirect()->route("adminDropoutSiswa");
    }
}
