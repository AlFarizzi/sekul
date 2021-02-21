<?php

namespace App\Http\Controllers\Repo;

use App\Models\Debt;
use App\Models\BillHistory;
use App\Models\DebtSetting;
use App\Http\Controllers\Controller;
use App\Jobs\FixDebt;
use App\Jobs\StudentSavings;
use Illuminate\Support\Facades\Auth;

class PaymentRepository extends Controller
{
    public function getSettings() {
        return DebtSetting::get();
    }

    public function fixDebt($setting) {
        $fixDebt = Debt::where("total",0)->get();
        if($fixDebt->count() > 0) {
            foreach ($fixDebt as $item) {
                $item->update([
                    "tahun" =>  $setting["tahun"],
                    "spp" => $setting["spp"],
                    "spm" => $setting["spm"],
                    "total" => $setting["spp"] + $setting["spm"]
                ]);
            }
        }
    }

    public function postSetting($request) {
        $tahun = DebtSetting::where("tahun",date("Y"))->get();
        $options = [
            "tahun" => Date("Y"),
            "spp" => $request["spp"] * 36,
            "spm" => $request["spm"],
            "total" => ($request["spp"] * 36) + $request["spm"]
        ];
        if(count($tahun) > 0) {
            dispatch(new StudentSavings($tahun,$request));
            // $tahun[0]->update($options);
        } else {
            $setting = DebtSetting::create($options);
            dispatch(new FixDebt($setting));
        }
    }

    public function createInstance($request) {
        $setting = DebtSetting::where("tahun",Date("Y"))->get();
        if($setting->count() > 0) {
            Debt::create([
                "user_id" => $request["id"],
                "tahun" => $setting[0]->tahun,
                "spp" => $setting[0]->spp,
                "spm" => $setting[0]->spm,
                "total" => $setting[0]->total
            ]);
        } else {
            Debt::create([
                "user_id" => $request["id"],
                "tahun" => 0000,
                "spp" => 0000,
                "spm" => 0000,
                "total" => 0000
            ]);
        }
    }

    public function recordHistory($student,$request,$sisa,$sisa_spp,$sisa_spm) {
        // dd($payment);
        BillHistory::create([
            "tanggal" => Date("d"),
            "bulan" => Date("F"),
            "tahun" => Date("Y"),
            "user_id" => $student["user_id"],
            "officer_id" => Auth::user()->id,
            "spm" => $request["spm"],
            "spp" => $request["spp"],
            "total_bayar" => $request["spp"] + $request["spm"],
            "sisa_hutang" => $sisa,
            "sisa_spp" => $sisa_spp,
            "sisa_spm" => $sisa_spm
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
        $this->recordHistory($student,$request,$total,$spp,$spm);
    }
}
