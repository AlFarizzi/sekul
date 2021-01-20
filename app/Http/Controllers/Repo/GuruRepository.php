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
        $repo = new UserRepository();
        $user = $repo->addUser($request);
        Teacher::create([
            "user_id" => $user["id"],
            "nik" => $request["nik"],
        ]);
    }

    public function deleteGuru($teacher) {
        $teacher->user->delete();
        $teacher->delete();
    }

    public function updateGuru($teacher,$request) {
        $repo = new UserRepository();
        $repo->updateUser($teacher->user,$request);
        $teacher->update([
            "nik" => $request["nik"],
        ]);
    }

}
