<?php

namespace App\Http\Controllers\Siswa;

use App\Jobs\NaikKelas;
use App\Models\Student;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use App\Http\Requests\SiswaRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Repo\KelasRepository;
use App\Http\Controllers\Repo\SiswaRepository;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Pembayaran\PembayaranController;

class SiswaController extends Controller
{
    public function getIndex() {
        return view("content.murid.index");
    }

    public function getSiswa(Request $request) {
        $repo = new SiswaRepository();
        $result = $repo->getSiswa($request->q);
        $students = $result[0];
        $classes = $result[1];
        return view("content.admin.siswa.students",compact("students","classes"));
    }

    public function getAddSiswa() {
        $classes = ClassRoom::get();
        return view("content.admin.siswa.add",compact("classes"));
    }

    public function postAddSiswa(SiswaRequest $request) {
        $input = $request->all();
        $input["role_id"] = 4;
        $input["photo_profile"] = "https://source.unsplash.com/random";
        $repo = new SiswaRepository();
        $repo->addSiswa($input);
        return redirect()->route("adminDataSiswa");
    }

    public function deleteSiswa(Student $student) {
        $repo = new SiswaRepository();
        $repo->deleteSiswa($student);
        return redirect()->back();
    }

    public function updateSiswa(Student $student) {
        $classes = ClassRoom::get();
        $view="content.".Auth::user()->role->role.".siswa.update";
        return view($view,compact("student","classes"));
    }

    public function updateeSiswa(Student $student, Request $request) {
        $repo = new SiswaRepository();
        $repo->updateSiswa($student,$request->all());
        return redirect()->back();
    }

    public function getNaikKelas() {
        $repo = new KelasRepository();
        $classes = $repo->getKelas();
        $view="content.".Auth::user()->role->role.".siswa.naik_kelas";
        return view($view,compact("classes"));
    }

    public function getNaikKelasMember(ClassRoom $class) {
        $repo = new SiswaRepository();
        $result = $repo->getSiswa($class->id);
        $classes = $result[1];
        $students = $result[0];
        $view="content.".Auth::user()->role->role.".siswa.naik_kelas_member";
        return view($view,compact("students","classes"));
    }

    public function naikKelasExec(Request $request) {
        $user_ids = [];
        $class_ids = [];
        foreach ($request->kelas as $kelas) {
            $result = explode("-",$kelas);
            $user_ids [] = $result[0];
            $class_ids [] = $result[1];
        }
        dispatch(new NaikKelas($user_ids,$class_ids));
        return redirect()->back();
    }

    public function getRiwayatPembayaran() {
        $admin = new PembayaranController();
        return $admin->getReceipt(Auth::user()->student);
    }

    public function getRiwayatAbsen() {
        $absents = Auth::user()->absents;
        return view("content.murid.absen.review",compact("absents"));
    }

    public function getRiwayatNilai(Request $request) {
        $values = Auth::user()->SubjectValues;
        return view("content.murid.nilai.detail",compact("values"));
    }
}
