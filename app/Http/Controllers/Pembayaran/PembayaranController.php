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
        public $siswaRepo,$paymentRepo;

        public function __construct(SiswaRepository $siswa, PaymentRepository $payment)
        {
            $this->siswaRepo = $siswa;
            $this->paymentRepo = $payment;
        }

        // ---------------------- PAYMENT ---------------------------
        public function settingPayment() {
            $view="content.".Auth::user()->role->role.".pembayaran.setting";
            $setting = DebtSetting::where('tahun',date("Y"))->get();
            return view($view,compact("setting"));
        }

        public function postSettingPayment(Request $request) {
            $request->validate([
                "tahun" => ["required", "unique:debt_settings,tahun"]
            ]);
            $created = $this->paymentRepo->postSetting($request->all());
            $created->id > 0
            ? Alert::success("Berhasil", "Setting Berhasil Ditambahkan")
            : Alert::error("Error", "Setting Gagal Ditambahkan");
            return redirect()->route(Auth::user()->role->role."GetPaymentSetting");
        }

        public function getSettingPayment() {
            $settings = $this->paymentRepo->getSettings();
            $view="content.".Auth::user()->role->role.".pembayaran.setting_list";
            return view($view,compact("settings"));
        }

        public function getUserDebt() {
            $students = $this->siswaRepo->getAllSiswa();
            $view="content.".Auth::user()->role->role.".pembayaran.students";
            return view($view,compact("students"));
        }

        public function formPayment(Student $student) {
            $view="content.".Auth::user()->role->role.".pembayaran.payment";
            return view($view,compact("student"));
        }

        public function postPayment(Request $request, Student $student) {
            try {
                $created = $this->paymentRepo->payment($student,$request);
                $created === true
                ? Alert::success("Berhasil", "Pembayran Berhasil Dilakukan")
                : Alert::error("Error", "Pembayaran Gagal Dilakukan");
                return redirect()->back();
            } catch (\Throwable $th) {
                Alert::error("Error", $th->getMessage());
                return redirect()->back();
            }

        }

        public function getUserReceipt() {
            $students = $this->siswaRepo->getAllSiswa();
            $view="content.".Auth::user()->role->role.".pembayaran.receipt";
            return view($view,compact("students"));
        }

        public function getReceipt(Student $student) {
            $view="content.".Auth::user()->role->role.".pembayaran.receipt_form";
            $receipts = $student->user->receipts;
            return view($view,compact("receipts"));
        }
}
