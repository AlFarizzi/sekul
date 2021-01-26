<?php

namespace App\Http\Controllers\Repo;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use App\Models\BillHistory;

use function PHPUnit\Framework\isNull;

class LaporanRepository extends Controller
{
    public function getSppTotal($y) {
        $total = null;
        $totalAmount = null;
        if(isset($y)) {
           $total = DB::table('bill_histories')
                    ->select(DB::raw('sum(spp) as total_spp,bulan,tahun'))
                    ->groupBy('bulan')->groupBy("tahun")->where("tahun", $y)
                    ->get();
            $totalAmount = BillHistory::where("tahun",$y)->sum("spp");
        } else {
            $total = DB::table('bill_histories')
                    ->select(DB::raw('sum(spp) as total_spp,bulan,tahun'))
                    ->groupBy('bulan')->groupBy("tahun")->where("tahun", date("Y"))
                    ->get();
            $totalAmount = BillHistory::where("tahun",$y)->sum("spp");
        }
        return [$total,$totalAmount];
    }

    public function getSpmTotal($y) {
        $total = null;
        $totalAmount = null;
        if(isset($y)) {
           $total = DB::table('bill_histories')
                    ->select(DB::raw('sum(spm) as total_spp,bulan,tahun'))
                    ->groupBy('bulan')->groupBy("tahun")->where("tahun", $y)
                    ->get();
            $totalAmount = BillHistory::where("tahun",$y)->sum("spm");
        } else {
            $total = DB::table('bill_histories')
                    ->select(DB::raw('sum(spm) as total_spp,bulan,tahun'))
                    ->groupBy('bulan')->groupBy("tahun")->where("tahun", date("Y"))
                    ->get();
            $totalAmount = BillHistory::where("tahun",date("Y"))->sum("spm");
        }
        return [$total,$totalAmount];
    }
}
