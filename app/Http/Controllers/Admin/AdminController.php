<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\SiswaRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Repo\GuruRepository;
use App\Http\Controllers\Repo\SiswaRepository;
use App\Models\ClassRoom;
use App\Models\Student;

class AdminController extends Controller
{
    public function adminIndex() {
        return view("content.admin.siswa.index");
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


    public function getGuru() {
        $repo = new GuruRepository();
        $teachers = $repo->getGuru();
        return view("content.admin.guru.teachers",compact("teachers"));
    }

    public function getAddGuru() {
        return view("content.admin.guru.add");
    }

    public function postAddGuru(Request $request) {
        $input = $request->all();
        $input["role_id"] = 2;
        $input["photo_profile"] = "https://source.unsplash.com/random";
        $repo = new GuruRepository();
        $repo->addGuru($input);
        return redirect()->route("adminGetGuru");
    }

}
