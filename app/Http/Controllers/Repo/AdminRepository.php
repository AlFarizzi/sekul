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
        $created = Admin::create([
            "user_id" => $user["id"],
            "nik" => $request["nik"]
        ]);
        return $created;
    }

    public function deleteAdmin($request) {
        $request->user->delete();
        $deleted = $request->delete();
        return $deleted;
    }

    public function updateAdmin($admin,$request) {
        $repo = new UserRepository();
        $repo->updateUser($admin->user,$request);
        $updated = $admin->update([
            "nik" => $request["nik"]
        ]);
        return $updated;
    }

}
