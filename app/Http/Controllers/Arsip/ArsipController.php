<?php

namespace App\Http\Controllers\Arsip;

use App\Models\Dropout;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Repo\SiswaRepository;

class ArsipController extends Controller
{
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
}
