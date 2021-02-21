<?php

namespace App\Http\Controllers\Nilai;

use App\Models\Report;
use App\Models\Student;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Repo\RaporRepository;

class RaporController extends Controller
{
    // ------------ RAPOR ------------------------------
    public function postInputNilaiRapor(Request $request, Student $student) {
        $request->validate([
            "nilai_sikap" => ["gte:0", "lte:100"],
            "nilai_teori" => ["gte:0", "lte:100"],
            "nilai_praktek" => ["gte:0", "lte:100"],
        ]);
        $repo = new RaporRepository();
        $created = $repo->inputNilaiRapor($request->all(),$student);
        isset($created)
        ? Alert::success("Berhasil", "Nilai Berhasil Diinput Pada ". date("m/d/Y - H:i:s"))
        : Alert::error("Error", "Nilai Gagal Diinput");
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
