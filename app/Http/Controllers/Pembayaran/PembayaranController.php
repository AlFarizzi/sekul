<?php

namespace App\Http\Controllers\Pembayaran;

use App\Models\Student;
use App\Models\DebtSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Repo\SiswaRepository;
use App\Http\Controllers\Repo\PaymentRepository;

class PembayaranController extends Controller
{
        // ---------------------- PAYMENT ---------------------------
        public function settingPayment() {
            $view="content.".Auth::user()->role->role.".pembayaran.setting";
            $setting = DebtSetting::where('tahun',date("Y"))->get();
            return view($view,compact("setting"));
        }

        public function postSettingPayment(Request $request) {
            $repo = new PaymentRepository();
            $repo->postSetting($request->all());
            return redirect()->route("getPaymentSetting");
        }

        public function getSettingPayment() {
            $repo = new PaymentRepository();
            $settings = $repo->getSettings();
            $view="content.".Auth::user()->role->role.".pembayaran.setting_list";
            return view($view,compact("settings"));
        }

        public function getUserDebt() {
            $repo = new SiswaRepository();
            $students = $repo->getAllSiswa();
            $view="content.".Auth::user()->role->role.".pembayaran.students";
            return view($view,compact("students"));
        }

        public function formPayment(Student $student) {
            $view="content.".Auth::user()->role->role.".pembayaran.payment";
            return view($view,compact("student"));
        }

        public function postPayment(Request $request, Student $student) {
            $repo = new PaymentRepository();
            $created = $repo->payment($student,$request);
            isset($created)
            ? Alert::success("Berhasil", "Pembayran Berhasil Dilakukan")
            : Alert::error("Error", "Pembayaran Gagal Dilakukan");
            return redirect()->back();
        }

        public function getUserReceipt() {
            $repo = new SiswaRepository();
            $students = $repo->getAllSiswa();
            $view="content.".Auth::user()->role->role.".pembayaran.receipt";
            return view($view,compact("students"));
        }

        public function getReceipt(Student $student) {
            $view="content.".Auth::user()->role->role.".pembayaran.receipt_form";
            $receipts = $student->user->receipts;
            return view($view,compact("receipts"));
        }
}
