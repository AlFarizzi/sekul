<?php

namespace App\Http\Controllers\Repo;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserRepository extends Controller
{
    public function addUser($request) {
        $user = User::create([
            "nama" => $request["nama"],
            "username" => $request["username"],
            "role_id" => $request["role_id"],
            "password" => bcrypt($request["password"]),
            "alamat" => $request["alamat"],
            "tempat_lahir" => $request["tempat_lahir"],
            "tanggal_lahir" => $request["tanggal_lahir"],
            "photo_profile" => $request["photo_profile"]
        ]);
            return $user;
    }

    public function updateUser($target,$request) {
        $user = $target->update([
            "username" => $request["username"],
            "nama" => $request["nama"],
            "tempat_lahir" => $request["tempat_lahir"],
            "tanggal_lahir" => $request["tanggal_lahir"]
        ]);
        return $user;
    }

}
