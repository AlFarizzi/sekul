<?php

namespace App\Http\Controllers\Repo;

use App\Http\Controllers\Controller;
use App\Models\Finance;
use Illuminate\Http\Request;

class KeuanganRepository extends Controller
{
    public function getKeuangan() {
        return Finance::with('user')->get();
    }

    public function addKeuangan($request) {
        $repo = new UserRepository();
        $user = $repo->addUser($request);
        Finance::create([
            "user_id" => $user["id"],
            "nik" => $request["nik"]
        ]);
    }

    public function deleteKeuangan($finance) {
        $finance->user->delete();
        $finance->delete();
    }

    public function updateKeuangan($finance,$request) {
        $repo = new UserRepository();
        $repo->updateUser($finance->user,$request);
        $finance->update([
            "user_id" => $finance->user->id,
            "nik" => $request["nik"]
        ]);
    }

}
