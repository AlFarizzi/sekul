<?php

namespace App\Http\Controllers\Laporan;

use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Repo\LaporanRepository;

class LaporanController extends Controller
{
    public $laporanRepo;

    public function __construct(LaporanRepository $laporan)
    {
        $this->laporanRepo = $laporan;
    }
    // -------------------- REPORT --------------------------
    public function getSppTotal(Request $request) {
        $result = $this->laporanRepo->getSppTotal($request->y);
        $total = $result[0];
        $totalAmount = $result[1];
        $view="content.".Auth::user()->role->role.".laporan.spp";
        return view($view,compact("total","totalAmount"));
    }

    public function getSpmTotal(Request $request) {
        $result = $this->laporanRepo->getSpmTotal($request->y);
        $total = $result[0];
        $totalAmount = $result[1];
        $view="content.".Auth::user()->role->role.".laporan.spm";
        return view($view,compact("total","totalAmount"));
    }

    public function getDataLaporan($type,$tahun) {
        $total = $type === "spp" ? $this->laporanRepo->getSppTotal($tahun)[0]: $this->laporanRepo->getSpmTotal($tahun)[0];
        $pdf = \PDF::loadView("content.pdf".".".$type,compact("total"));
        return $pdf->setPaper('a4')->stream();
    }

    public function downloadLaporanSPP($tahun) {
        return $this->getDataLaporan("spp", $tahun);
    }

    public function downloadLaporanSPM($tahun) {
        return $this->getDataLaporan("spm", $tahun);
    }

}
