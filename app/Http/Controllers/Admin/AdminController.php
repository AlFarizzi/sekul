<?php

namespace App\Http\Controllers\Admin;

use App\Jobs\doAbsen;
use App\Jobs\reAbsen;
use App\Models\Admin;
use App\Models\Report;
use App\Jobs\NaikKelas;
use App\Models\Dropout;
use App\Models\Finance;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\ClassRoom;
use App\Models\BillHistory;
use App\Models\DebtSetting;
use Illuminate\Http\Request;
use App\Http\Requests\SiswaRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PegawaiRequest;
use App\Http\Controllers\Repo\GuruRepository;
use App\Http\Controllers\Repo\UserRepository;
use App\Http\Controllers\Repo\AbsenRepository;
use App\Http\Controllers\Repo\AdminRepository;
use App\Http\Controllers\Repo\KelasRepository;
use App\Http\Controllers\Repo\RaporRepository;
use App\Http\Controllers\Repo\SiswaRepository;
use App\Http\Controllers\Repo\LaporanRepository;
use App\Http\Controllers\Repo\PaymentRepository;
use App\Http\Controllers\Repo\SubjectRepository;
use App\Http\Controllers\Repo\KeuanganRepository;
use Illuminate\Contracts\Support\DeferringDisplayableValue;

class AdminController extends Controller
{
    public function adminIndex() {
        return view("content.admin.index");
    }

    public function getSiswa(Request $request) {
        $repo = new SiswaRepository();
        $result = $repo->getSiswa($request->q);
        $students = $result[0];
        $classes = $result[1];
        return view("content.admin.siswa.students",compact("students","classes"));
    }

    public function getAddSiswa() {
        $classes = ClassRoom::get();
        return view("content.admin.siswa.add",compact("classes"));
    }

    public function postAddSiswa(SiswaRequest $request) {
        $input = $request->all();
        $input["role_id"] = 4;
        $input["photo_profile"] = "https://source.unsplash.com/random";
        $repo = new SiswaRepository();
        $repo->addSiswa($input);
        return redirect()->route("adminDataSiswa");
    }

    public function deleteSiswa(Student $student) {
        $repo = new SiswaRepository();
        $repo->deleteSiswa($student);
        return redirect()->back();
    }

    public function updateSiswa(Student $student) {
        $classes = ClassRoom::get();
        $view="content.".Auth::user()->role->role.".siswa.update";
        return view($view,compact("student","classes"));
    }

    public function updateeSiswa(Student $student, Request $request) {
        $repo = new SiswaRepository();
        $repo->updateSiswa($student,$request->all());
        return redirect()->back();
    }

    public function getNaikKelas() {
        $repo = new KelasRepository();
        $classes = $repo->getKelas();
        $view="content.".Auth::user()->role->role.".siswa.naik_kelas";
        return view($view,compact("classes"));
    }

    public function getNaikKelasMember(ClassRoom $class) {
        $repo = new SiswaRepository();
        $result = $repo->getSiswa($class->id);
        $classes = $result[1];
        $students = $result[0];
        $view="content.".Auth::user()->role->role.".siswa.naik_kelas_member";
        return view($view,compact("students","classes"));
    }

    public function naikKelasExec(Request $request) {
        $user_ids = [];
        $class_ids = [];
        foreach ($request->kelas as $kelas) {
            $result = explode("-",$kelas);
            $user_ids [] = $result[0];
            $class_ids [] = $result[1];
        }
        dispatch(new NaikKelas($user_ids,$class_ids));
        return redirect()->back();
    }

    // --------------- GURU -----------------------

    public function getGuru() {
        $repo = new GuruRepository();
        $teachers = $repo->getGuru();
        $view="content.".Auth::user()->role->role."..guru.teachers";
        return view($view,compact("teachers"));
    }

    public function getAddGuru() {
        return view("content.admin.guru.add");
    }

    public function postAddGuru(PegawaiRequest $request) {
        $input = $request->all();
        $input["role_id"] = 2;
        $input["photo_profile"] = "https://source.unsplash.com/random";
        $repo = new GuruRepository();
        $repo->addGuru($input);
        return redirect()->route("adminGetGuru");
    }

    public function deleteGuru(Teacher $teacher) {
        $repo = new GuruRepository();
        $repo->deleteGuru($teacher);
        return redirect()->back();
    }

    public function updateGuru(Teacher $teacher) {
        $target = $teacher;
        $view="content.".Auth::user()->role->role.".guru.update";
        return view($view,compact("target"));
    }

    public function updateeGuru(Teacher $teacher, Request $request) {
        $repo = new GuruRepository();
        $repo->updateGuru($teacher,$request->all());
        return redirect()->route("adminGetGuru");
    }

    // ----------------- KEUANGAN ---------------------------------

    public function getKeuangan() {
        $repo = new KeuanganRepository();
        $finances = $repo->getKeuangan();
        $view="content.".Auth::user()->role->role.".keuangan.finance";
        return view($view,compact("finances"));
    }

    public function getAddKeuangan() {
        return view("content.admin.keuangan.add");
    }

    public function postAddKeuangan(PegawaiRequest $request) {
        $input = $request->all();
        $input["role_id"] = 3;
        $input["photo_profile"] = "https://source.unsplash.com/random";
        $repo = new KeuanganRepository();
        $repo->addKeuangan($input);
        return redirect()->route("adminGetKeuangan");
    }

    public function deleteKeuangan(Finance $finance) {
        $repo = new KeuanganRepository();
        $repo->deleteKeuangan($finance);
        return redirect()->route("adminGetKeuangan");
    }

    public function updateKeuangan(Finance $finance) {
        $target = $finance;
        return view("content.admin.keuangan.update",compact("target"));
    }

    public function updateeKeuangan(Finance $finance, Request $request) {
        $repo = new KeuanganRepository();
        $repo->updateKeuangan($finance,$request);
        return redirect()->route("adminGetKeuangan");
    }

    // --------------- Graduation System ---------------------------

    public function getKelulusan() {
        $repo = new SiswaRepository();
        $students = $repo->getWillGraduate();
        return view("content.admin.siswa.graduate",compact("students"));
    }

    public function postKelulusan() {
        $repo = new SiswaRepository();
        $repo->postGraduation();
        return redirect()->route("adminDataSiswa");
    }

    // ---------- Dropout System -----------

    public function getDropout() {
        $repo = new SiswaRepository();
        $students = $repo->getAllSiswa();
        return view("content.admin.siswa.dropout",compact("students"));
    }

    public function formDropout(Student $student) {
        return view("content.admin.siswa.dropout_form",compact("student"));
    }

    public function postDropout(Request $request) {
        $repo = new SiswaRepository();
        $repo->dropoutSystem($request->all());
        return redirect()->route("adminDropoutSiswa");
    }

    // ---------------- ARSIP -----------------------
    public function getArsipDropout() {
        $repo = new SiswaRepository();
        $students = $repo->getArsipDropout();
        return view("content.admin.arsip.dropout",compact("students"));
    }

    public function getDetailDropout(Dropout $student) {
        return view("content.admin.arsip.detailDropout",compact("student"));
    }

    public  function getArsipGraduation () {
        $repo = new SiswaRepository();
        $students = $repo->getArsipGraduation();
        return view("content.admin.siswa.graduation",compact("students"));
    }

    // ------------------ KELAS --------------

    public function getKelas() {
        $repo = new KelasRepository();
        $class = $repo->getKelas();
        return view("content.admin.kelas.classes",compact("class"));
    }

    public function getPostKelas() {
        return view("content.admin.kelas.tambah");
    }

    public function postKelas(Request $request) {
        $request->validate([
            "nama_kelas" => ["required", "unique:class_rooms,class"]
        ]);
        $repo = new KelasRepository();
        $repo->postKelas($request->all());
        return redirect()->route("adminGetKelas");
    }

    public function getKelasMember(ClassRoom $class) {
        $students = $class->students;
        return view("content.admin.kelas.member",compact("students"));
    }

    // ---------------- ADMIN ---------------------

    public function getAdmins() {
        $repo = new AdminRepository();
        $admins = $repo->getAdmins();
        return view("content.admin.admin.admins",compact("admins"));
    }

    public function getPostAdmin() {
        return view("content.admin.admin.tambah");
    }

    public function postAdmin(PegawaiRequest $request) {
        $input = $request->all();
        $input["role_id"] = 1;
        $input["photo_profile"] = "https://source.unsplash.com/random";
        $repo = new AdminRepository();
        $repo->postAdmin($request->all());
        return redirect()->route("adminGetAdmins");
    }

    public function deleteAdmin(Admin $admin) {
        $repo = new AdminRepository();
        $repo->deleteAdmin($admin);
        return redirect()->back();
    }

    public function updateAdmin(Admin $admin) {
        $target = $admin;
        return view("content.admin.admin.update",compact("target"));
    }

    public function updateeAdmin(Request $request, Admin $admin) {
        $repo = new AdminRepository();
        $repo->updateAdmin($admin,$request->all());
        return redirect()->route("adminGetAdmins");
    }

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
        $repo->payment($student,$request);
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

    // ------------------------ ABSEN ---------------------
    public function getAbsenKelas() {
        $repo = new KelasRepository();
        $classes = $repo->getKelas();
        $view="content.".Auth::user()->role->role.".absen.kelas";
        return view($view,compact("classes"));
    }

    public function getAbsenMember(ClassRoom $class) {
        // dD(Auth::user()->id);
        $students = $class->students;
        $view="content.".Auth::user()->role->role.".absen.absen";
        return view($view,compact("students","class"));
    }

    public function extractAbsen($request,$guru) {
        $absen = ["hadir" => [], "izin" => [], "sakit" => [], "guru" => $guru];
        foreach ($request as $item) {
            $result = explode("-",$item);
            foreach ($absen as $key => $item) {
                if($result[1] === $key) array_push($absen[$result[1]],$result[0]);
            }
        }
        return $absen;
    }

    public function absen(Request $request,ClassRoom $class) {
        $absen = $this->extractAbsen($request->absen,Auth::user()->id);
        dispatch(new doAbsen($absen,$class));
        return back();
    }

    public function getPreview() {
        $repo = new KelasRepository();
        $classes = $repo->getKelas();
        $view="content.".Auth::user()->role->role.".absen.kelas";
        return view($view,compact("classes"));
    }

    public function getAbsen(Request $request,ClassRoom $class,$guru) {
        // dd($request->all());
        $repo = new AbsenRepository();
        $result = $repo->getAbsen($class,$guru,$request->hours,$request->date);
        $absents = $result[0];
        session()->flash("params", [$class,$guru,$result[1]]);
        $view="content.".Auth::user()->role->role.".absen.review";
        return view($view,compact("absents"));
    }

    public function editAbsen(Request $request, ClassRoom $class, $guru) {
        dd($request->all());
        $absen = $this->extractAbsen($request->absen,$guru);
        dispatch(new reAbsen($absen,$request->date));
        // dispatch(new doAbsen($absen,$class));
        return back();
    }

    // --------------------- NILAI ---------------------------
    public function getKelasNilai() {
        $repo = new KelasRepository();
        $classes = $repo->getKelas();
        $view="content.".Auth::user()->role->role.".nilai.kelas";
        return view($view,compact("classes"));
    }

    public function getKelasMemberNilai(ClassRoom $class) {
        $students = $class->students;
        $view="content.".Auth::user()->role->role.".nilai.member";
        return view($view,compact("students","class"));
    }

    public function getInputNilai(ClassRoom $class, Student $student) {
        $repo = new SubjectRepository();
        $subjects = $repo->getSubjects();
        $view="content.".Auth::user()->role->role.".nilai.input";
        return view($view,compact("class","student","subjects"));
    }

    public function postInputNilai(Student $student,Request $request) {
        $request->validate([
            "nilai" => ["gte:0","lte:100"]
        ]);
        $repo = new SubjectRepository();
        $repo->inputNilai($student->user_id,Auth::user()->id,
        $student->class_id,date("Y"),$request->all());
        return redirect()->back();
    }

    public function viewNilaiKelas() {
        $repo = new KelasRepository();
        $classes = $repo->getKelas();
        $view="content.".Auth::user()->role->role.".nilai.kelas";
        return view($view,compact("classes"));
    }

    public function getDetailNilai(ClassRoom $class, Request $request) {
        $repo = new SubjectRepository();
        $students = $class->students;
        $view="content.".Auth::user()->role->role.".nilai.member";
        return view($view,compact("students","class"));
    }

    public function getNilaiDetail(Request $request,ClassRoom $class, Student $student) {
        $repo = new SubjectRepository();
        $values = $repo->getDetailNilai($request->mapel,$request->semester,$class->id,$student->user_id);
        $subjects = $repo->getSubjects();
        $view="content.".Auth::user()->role->role.".nilai.detail";
        return view($view,compact("values","subjects","class","student"));
    }

    // ------------ RAPOR ------------------------------
    public function postInputNilaiRapor(Request $request, Student $student) {
        $request->validate([
            "nilai_sikap" => ["gte:0", "lte:100"],
            "nilai_teori" => ["gte:0", "lte:100"],
            "nilai_praktek" => ["gte:0", "lte:100"],
        ]);
        $repo = new RaporRepository();
        $repo->inputNilaiRapor($request->all(),$student);
        return redirect()->back();
    }

    public function getNilaiDetailRapor(ClassRoom $class,Student $student, Request $request) {
        $reports = null;
        if($request->semester === null) {
            $reports = $student->user->reports;
        } else {
            $reports = Report::where('semester',$request->semester)->get();
        }
        $view = "content.".Auth::user()->role->role.".nilai.rapor";
        return view($view,compact("student","class","reports"));

    }

}

