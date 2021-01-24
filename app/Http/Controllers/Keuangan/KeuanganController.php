<?php

namespace App\Http\Controllers\Keuangan;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Repo\SiswaRepository;
use App\Http\Controllers\Repo\PaymentRepository;

class KeuanganController extends Controller
{
    public function getIndex() {
        return view("content.keuangan.index");
    }


    public function getSettingPayment() {
        $repo = new PaymentRepository();
        $settings = $repo->getSettings();
        return view("content.keuangan.setting_list",compact("settings"));
    }

    public function getUserDebt() {
        $repo = new SiswaRepository();
        $students = $repo->getAllSiswa();
        return view("content.keuangan.students",compact("students"));
    }

    public function formPayment(Student $student) {
        return view("content.keuangan.payment",compact("student"));
    }

    public function postPayment(Request $request, Student $student) {
        $repo = new PaymentRepository();
        $repo->payment($student,$request);
        return redirect()->back();
    }

    public function getUserReceipt() {
        $repo = new SiswaRepository();
        $students = $repo->getAllSiswa();
        return view("content.keuangan.receipt",compact("students"));
    }

    public function getReceipt(Student $student) {
        return view("content.keuangan.receipt_form",compact("student"));
    }
}
