<?php

namespace App\Http\Controllers\Keuangan;

use App\Models\Finance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PegawaiRequest;
use App\Http\Controllers\Repo\KeuanganRepository;
use RealRashid\SweetAlert\Facades\Alert;

class KeuanganController extends Controller
{
    public $keuanganRepo;

    public function __construct(KeuanganRepository $keuangan)
    {
        $this->keuanganRepo = $keuangan;
    }

    // ----------------- KEUANGAN ---------------------------------

    public function getKeuangan() {
        $finances = $this->keuanganRepo->getKeuangan();
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
        $created = $this->keuanganRepo->addKeuangan($input);
        $created
        ? Alert::success("Berhasil", "Data Berhasil Ditambahkan")
        : Alert::error("Error", "Data Gagal Ditambahkan");
        return redirect()->route("adminGetKeuangan");
    }

    public function deleteKeuangan(Finance $finance) {
        $this->keuanganRepo->deleteKeuangan($finance);
        return redirect()->route("adminGetKeuangan");
    }

    public function updateKeuangan(Finance $finance) {
        $target = $finance;
        return view("content.admin.keuangan.update",compact("target"));
    }

    public function updateeKeuangan(Finance $finance, Request $request) {
        $this->keuanganRepo->updateKeuangan($finance,$request);
        return redirect()->route("adminGetKeuangan");
    }
}
