<?php

namespace App\Http\Controllers\Guru;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PegawaiRequest;
use App\Http\Controllers\Repo\GuruRepository;
use RealRashid\SweetAlert\Facades\Alert;

class GuruController extends Controller
{
    public $guruRepo;

    public function __construct(GuruRepository $guru)
    {
        $this->guruRepo = $guru;
    }
    // --------------- GURU -----------------------

    public function getGuru() {
        $teachers = $this->guruRepo->getGuru();
        $view="content.".Auth::user()->role->role."..guru.teachers";
        return view($view,compact("teachers"));
    }

    public function getAddGuru() {
        return view("content.admin.guru.add");
    }

    public function postAddGuru(PegawaiRequest $request) {
        $input = $request->all();
        $input["role_id"] = 2;
        $input["photo_profile"] = "https://source.unsplash.com/random";
        $c = $this->guruRepo->addGuru($input);
        $c
        ? Alert::success("Berhasil", "Data Berhasil Ditambahkan")
        : Alert::error("Error", "Data Gagal Ditambahkan");
        return redirect()->route("adminGetGuru");
    }

    public function deleteGuru(Teacher $teacher) {
        $d = $this->guruRepo->deleteGuru($teacher);
        $d
        ? Alert::success("Berhasil", "Data Berhasil Dihapus")
        : Alert::error("Error", "Data Gagal Dihapus");
        return redirect()->back();
    }

    public function updateGuru(Teacher $teacher) {
        $target = $teacher;
        $view="content.".Auth::user()->role->role.".guru.update";
        return view($view,compact("target"));
    }

    public function updateeGuru(Teacher $teacher, Request $request) {
        $u = $this->guruRepo->UpdateGuru($teacher,$request->all());
        $u
        ? Alert::success("Berhasil", "Update Data Berhasil Dilakukan")
        : Alert::error("Error", "Update Data Gagal Dilakukan");
        return redirect()->route("adminGetGuru");
    }
}
