<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Repo\SiswaRepository;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getStudent(Request $request) {
        $repo = new SiswaRepository();
        $result = $repo->getSiswa($request->q);
        $students = $result[0];
        $classes = $result[1];
        return view("content.admin.siswa.students",compact("students","classes"));
    }
}
