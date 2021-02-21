<?php

namespace App\Http\Controllers\Repo;

use App\Http\Controllers\Controller;
use App\Models\ClassRoom;

class KelasRepository extends Controller
{
    public function getKelas() {
        return ClassRoom::get();
    }

    public function postKelas($request) {
        ClassRoom::create([
            "class" => $request["nama_kelas"]
        ]);
    }

}
