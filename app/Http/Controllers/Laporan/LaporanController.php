<?php

namespace App\Http\Controllers\Laporan;

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
}
