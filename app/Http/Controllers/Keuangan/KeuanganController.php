<?php

namespace App\Http\Controllers\Keuangan;

use App\Models\Finance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PegawaiRequest;
use App\Http\Controllers\Repo\KeuanganRepository;

class KeuanganController extends Controller
{
    // ----------------- KEUANGAN ---------------------------------

    public function getKeuangan() {
        $repo = new KeuanganRepository();
        $finances = $repo->getKeuangan();
        $view="content.".Auth::user()->role->role.".keuangan.finance";
        return view($view,compact("finances"));
    }

    public function getAddKeuangan() {
        return view("content.admin.keuangan.add");
    }

    public function postAddKeuangan(PegawaiRequest $request) {
        $input = $request->all();
        $input["role_id"] = 3;
        $input["photo_profile"] = "https://source.unsplash.com/random";
        $repo = new KeuanganRepository();
        $repo->addKeuangan($input);
        return redirect()->route("adminGetKeuangan");
    }

    public function deleteKeuangan(Finance $finance) {
        $repo = new KeuanganRepository();
        $repo->deleteKeuangan($finance);
        return redirect()->route("adminGetKeuangan");
    }

    public function updateKeuangan(Finance $finance) {
        $target = $finance;
        return view("content.admin.keuangan.update",compact("target"));
    }

    public function updateeKeuangan(Finance $finance, Request $request) {
        $repo = new KeuanganRepository();
        $repo->updateKeuangan($finance,$request);
        return redirect()->route("adminGetKeuangan");
    }
}
