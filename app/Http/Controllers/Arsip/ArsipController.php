<?php

namespace App\Http\Controllers\Arsip;

use App\Models\Dropout;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Repo\SiswaRepository;

class ArsipController extends Controller
{
    public $siswaRepo;

    public function __construct(SiswaRepository $siswa)
    {
        $this->siswaRepo = $siswa;
    }

    // ---------------- ARSIP -----------------------
    public function getArsipDropout() {
        $students = $this->siswaRepo->getArsipDropout();
        return view("content.admin.arsip.dropout",compact("students"));
    }

    public function getDetailDropout(Dropout $student) {
        return view("content.admin.arsip.detailDropout",compact("student"));
    }

    public  function getArsipGraduation () {
        $students = $this->siswaRepo->getArsipGraduation();
        return view("content.admin.siswa.graduation",compact("students"));
    }
}
