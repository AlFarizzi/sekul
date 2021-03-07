<?php

namespace App\Http\Controllers\Guru;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PegawaiRequest;
use App\Http\Controllers\Repo\GuruRepository;

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
        $this->guruRepo->addGuru($input);
        return redirect()->route("adminGetGuru");
    }

    public function deleteGuru(Teacher $teacher) {
        $this->guruRepo->deleteGuru($teacher);
        return redirect()->back();
    }

    public function updateGuru(Teacher $teacher) {
        $target = $teacher;
        $view="content.".Auth::user()->role->role.".guru.update";
        return view($view,compact("target"));
    }

    public function updateeGuru(Teacher $teacher, Request $request) {
        $this->guruRpdateGuru($teacher,$request->all());
        return redirect()->route("adminGetGuru");
    }
}
