<?php

namespace App\Http\Controllers\Repo;

use App\Http\Controllers\Controller;
use App\Models\Admin;

class AdminRepository extends Controller
{
    public function getAdmins() {
        return Admin::get();
    }

    public function postAdmin($request) {
        $request["role_id"] = 1;
        $request["photo_profile"] = "https://source.unsplash.com/random";
        $repo = new UserRepository();
        $user = $repo->addUser($request);
        Admin::create([
            "user_id" => $user["id"],
            "nik" => $request["nik"]
        ]);
    }

    public function deleteAdmin($request) {
        $request->user->delete();
        $request->delete();
    }

    public function updateAdmin($admin,$request) {
        $repo = new UserRepository();
        $repo->updateUser($admin->user,$request);
        $admin->update([
            "nik" => $request["nik"]
        ]);
    }

}
