<?php

namespace App\Http\Controllers\Repo;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class GuruRepository extends Controller
{

    public function getGuru() {
        return Teacher::with("user")->get();
    }

    public function addGuru($request) {
        $repo = new SiswaRepository();
        $user = $repo->addUser($request);
        Teacher::create([
            "user_id" => $user["id"],
            "nik" => $request["nik"],
        ]);
    }
}
