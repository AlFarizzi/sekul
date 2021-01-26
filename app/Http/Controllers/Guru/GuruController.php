<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Repo\KelasRepository;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function getIndex() {
        return view("content.guru.index");
    }

    public function getAbsen() {
        $repo = new KelasRepository();
        $classes = $repo->getKelas();
        return view("content.guru.absen",compact("classes"));
    }

}
