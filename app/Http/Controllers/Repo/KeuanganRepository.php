<?php

namespace App\Http\Controllers\Repo;

use App\Http\Controllers\Controller;
use App\Models\Finance;

class KeuanganRepository extends Controller
{

    public $userRepo;

    public function __construct(UserRepository $user)
    {
        $this->userRepo = $user;
    }

    public function getKeuangan() {
        return Finance::with('user')->get();
    }

    public function addKeuangan($request) {
        $user = $user = $this->userRepo->addUser($request);
        $finance = Finance::create([
            "user_id" => $user["id"],
            "nik" => $request["nik"]
        ]);
        return $user && $finance;
    }

    public function deleteKeuangan($finance) {
        $finance->user->delete();
        $finance->delete();
    }

    public function updateKeuangan($finance,$request) {
        $this->siswaRepo->updateUser($finance->user,$request);
        $finance->update([
            "user_id" => $finance->user->id,
            "nik" => $request["nik"]
        ]);
    }

}
