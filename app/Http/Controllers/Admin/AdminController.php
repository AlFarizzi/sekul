<?php

namespace App\Http\Controllers\Admin;

use App\Models\Finance;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use App\Http\Requests\SiswaRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\PegawaiRequest;
use App\Http\Controllers\Repo\GuruRepository;
use App\Http\Controllers\Repo\KelasRepository;
use App\Http\Controllers\Repo\SiswaRepository;
use App\Http\Controllers\Repo\KeuanganRepository;
use App\Http\Controllers\Repo\UserRepository;
use App\Models\Dropout;

class AdminController extends Controller
{
    public function adminIndex() {
        return view("content.admin.index");
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
        return view("content.admin.siswa.update",compact("student","classes"));
    }

    public function updateeSiswa(Student $student, Request $request) {
        $repo = new SiswaRepository();
        $repo->updateSiswa($student,$request->all());
        return redirect()->back();
    }

    // --------------- GURU -----------------------

    public function getGuru() {
        $repo = new GuruRepository();
        $teachers = $repo->getGuru();
        return view("content.admin.guru.teachers",compact("teachers"));
    }

    public function getAddGuru() {
        return view("content.admin.guru.add");
    }

    public function postAddGuru(PegawaiRequest $request) {
        $input = $request->all();
        $input["role_id"] = 2;
        $input["photo_profile"] = "https://source.unsplash.com/random";
        $repo = new GuruRepository();
        $repo->addGuru($input);
        return redirect()->route("adminGetGuru");
    }

    public function deleteGuru(Teacher $teacher) {
        $repo = new GuruRepository();
        $repo->deleteGuru($teacher);
        return redirect()->back();
    }

    public function updateGuru(Teacher $teacher) {
        $target = $teacher;
        return view("content.admin.guru.update",compact("target"));
    }

    public function updateeGuru(Teacher $teacher, Request $request) {
        $repo = new GuruRepository();
        $repo->updateGuru($teacher,$request->all());
        return redirect()->route("adminGetGuru");
    }

    // ----------------- KEUANGAN ---------------------------------

    public function getKeuangan() {
        $repo = new KeuanganRepository();
        $finances = $repo->getKeuangan();
        return view('content.admin.keuangan.finance',compact("finances"));
    }

    public function getAddKeuangan() {
        return view("content.admin.keuangan.add");
    }

    public function postAddKeuangan(PegawaiRequest $request) {
        $input = $request->all();
        $input["role_id"] = 3;
        $input["photo_profile"] = "https://source.unsplash.com/random";
        $repo = new KeuanganRepository();
        $repo->addKeuangan($input);
        return redirect()->route("adminGetKeuangan");
    }

    public function deleteKeuangan(Finance $finance) {
        $repo = new KeuanganRepository();
        $repo->deleteKeuangan($finance);
        return redirect()->route("adminGetKeuangan");
    }

    public function updateKeuangan(Finance $finance) {
        $target = $finance;
        return view("content.admin.keuangan.update",compact("target"));
    }

    public function updateeKeuangan(Finance $finance, Request $request) {
        $repo = new KeuanganRepository();
        $repo->updateKeuangan($finance,$request);
        return redirect()->route("adminGetKeuangan");
    }

    // --------------- Graduation System ---------------------------

    public function getKelulusan() {
        $repo = new SiswaRepository();
        $students = $repo->getWillGraduate();
        return view("content.admin.siswa.graduate",compact("students"));
    }

    public function postKelulusan() {
        $repo = new SiswaRepository();
        $repo->postGraduation();
        return redirect()->route("adminDataSiswa");
    }

    // ---------- DropoutSyste -----------

    public function getDropout() {
        $repo = new SiswaRepository();
        $students = $repo->getAllSiswa();
        return view("content.admin.siswa.dropout",compact("students"));
    }

    public function formDropout(Student $student) {
        return view("content.admin.siswa.dropout_form",compact("student"));
    }

    public function postDropout(Request $request) {
        $repo = new SiswaRepository();
        $repo->dropoutSystem($request->all());
        return redirect()->route("adminDropoutSiswa");
    }

    // ---------------- ARSIP -----------------------
    public function getArsipDropout() {
        $repo = new SiswaRepository();
        $students = $repo->getArsipDropout();
        return view("content.admin.arsip.dropout",compact("students"));
    }

    public function getDetailDropout(Dropout $student) {
        return view("content.admin.arsip.detailDropout",compact("student"));
    }

    public  function getArsipGraduation () {
        $repo = new SiswaRepository();
        $students = $repo->getArsipGraduation();
        return view("content.admin.siswa.graduation",compact("students"));
    }

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

}
