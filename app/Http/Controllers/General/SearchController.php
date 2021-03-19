<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Repo\KelasRepository;
use App\Http\Controllers\Repo\SiswaRepository;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getStudent(Request $request) {
        $repo = new SiswaRepository();
        $class = new KelasRepository();
        $students = $repo->getSiswa($request->q);
        $classes = $class->getKelas();
        return view("content.admin.siswa.students",compact("students","classes"));
    }
}
