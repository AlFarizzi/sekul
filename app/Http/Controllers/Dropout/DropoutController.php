<?php

namespace App\Http\Controllers\Dropout;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Repo\SiswaRepository;

class DropoutController extends Controller
{
    public $siswaRepo;

    public function __construct(SiswaRepository $siswa)
    {
        $this->siswaRepo = $siswa;
    }

     // ---------- Dropout System -----------

     public function getDropout() {
        $students = $this->siswaRepo->getAllSiswa();
        return view("content.admin.siswa.dropout",compact("students"));
    }

    public function formDropout(Student $student) {
        return view("content.admin.siswa.dropout_form",compact("student"));
    }

    public function postDropout(Request $request) {
        // dd($request->all());
        $this->siswaRepo->dropoutSystem($request->all());
        Alert::success("Berhasil", "Siswa Berhasil Didropout Pada ". date("m/d/Y H:i:s"));
        return redirect()->route("adminDropoutSiswa");
    }
}
