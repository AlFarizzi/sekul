<?php

namespace App\Http\Controllers\Repo;

use App\Models\Debt;
use App\Models\BillHistory;
use App\Models\DebtSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PaymentRepository extends Controller
{
    public function getSettings() {
        return DebtSetting::get();
    }

    public function postSetting($request) {
        $total = $request["spp"] + $request["spm"];
        DebtSetting::create([
            "tahun" => Date("Y"),
            "spp" => $request["spp"],
            "spm" => $request["spm"],
            "total" => $total
        ]);
    }

    public function createInstance($request) {
        $setting = DebtSetting::where("tahun",Date("Y"))->get()[0];
        Debt::create([
            "user_id" => $request["id"],
            "tahun" => $setting->tahun,
            "spp" => $setting->spp,
            "spm" => $setting->spm,
            "total" => $setting->total
        ]);
    }

    public function createHistory() {

    }

    public function recordHistory($student,$request,$sisa) {
        // dd($payment);
        BillHistory::create([
            "tanggal_bayar" => Date("d,M,Y"),
            "user_id" => $student["user_id"],
            "officer_id" => Auth::user()->id,
            "spm" => $request["spm"],
            "spp" => $request["spp"],
            "total_bayar" => $request["spp"] + $request["spm"],
            "sisa_hutang" => $sisa
        ]);
    }

    public function payment($student,$request) {
        $spp = $student->user->debt->spp - $request["spp"];
        $spm = $student->user->debt->spm - $request["spm"];
        $total = $student->user->debt->total - ( $request["spp"] + $request["spm"] );
        $payment = $student->user->debt->update([
            "spp" => $spp <= 0 ? 0 : $spp,
            "spm" => $spm <= 0 ? 0 : $spm,
            "total" => $total <= 0 ? 0 : $total
        ]);
        $this->recordHistory($student,$request,$total);
    }
}
