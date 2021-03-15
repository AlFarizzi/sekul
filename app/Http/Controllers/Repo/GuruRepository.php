<?php

namespace App\Http\Controllers\Repo;

use App\Http\Controllers\Controller;
use App\Models\Teacher;

class GuruRepository extends Controller
{

    public function getGuru() {
        return Teacher::with("user")->get();
    }

    public function addGuru($request) {
        $repo = new UserRepository();
        $user = $repo->addUser($request);
        $t = Teacher::create([
            "user_id" => $user["id"],
            "nik" => $request["nik"],
        ]);
        return isset($t);
    }

    public function deleteGuru($teacher) {
        $teacher->user->delete();
        $d = $teacher->delete();
        return $d;
    }

    public function updateGuru($teacher,$request) {
        $repo = new UserRepository();
        $repo->updateUser($teacher->user,$request);
        $u = $teacher->update([
            "nik" => $request["nik"],
        ]);
        return $u;
    }

}
