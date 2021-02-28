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
        $posted = ClassRoom::create([
            "class" => $request["nama_kelas"]
        ]);
        return $posted->id !== 0;
    }

    public function updateKelas($request,$class) {
        $updated = $class->update([
            "class" => $request["kelas"]
        ]);
        return $updated;
    }

}
