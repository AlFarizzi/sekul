<?php

namespace App\Http\Controllers\Laporan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Repo\LaporanRepository;

class LaporanController extends Controller
{
    // -------------------- REPORT --------------------------
    public function getSppTotal(Request $request) {
        $repo = new LaporanRepository();
        $result = $repo->getSppTotal($request->y);
        $total = $result[0];
        $totalAmount = $result[1];
        $view="content.".Auth::user()->role->role.".laporan.spp";
        return view($view,compact("total","totalAmount"));
    }

    public function getSpmTotal(Request $request) {
        $repo = new LaporanRepository();
        $result = $repo->getSpmTotal($request->y);
        $total = $result[0];
        $totalAmount = $result[1];
        $view="content.".Auth::user()->role->role.".laporan.spm";
        return view($view,compact("total","totalAmount"));
    }
}
