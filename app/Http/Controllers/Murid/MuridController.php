<?php

namespace App\Http\Controllers\Murid;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Repo\AbsenRepository;
use Illuminate\Support\Facades\Auth;

class MuridController extends Controller
{
    public function getIndex() {
        return view("content.murid.index");
    }

    public function getRiwayatPembayaran() {
        $admin = new AdminController();
        return $admin->getReceipt(Auth::user()->student);
    }

    public function getRiwayatAbsen() {
        $absents = Auth::user()->absents;
        return view("content.murid.absen.review",compact("absents"));
    }

    public function getRiwayatNilai(Request $request) {
        $values = Auth::user()->SubjectValues;
        return view("content.murid.nilai.detail",compact("values"));
    }

}
