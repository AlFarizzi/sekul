<?php

namespace App\Http\Controllers\Nilai;

use App\Models\Student;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Repo\KelasRepository;
use App\Http\Controllers\Repo\SubjectRepository;

class NilaiController extends Controller
{
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
            $created = $repo->inputNilai($student->user_id,Auth::user()->id,
            $student->class_id,date("Y"),$request->all());
            isset($created)
            ? Alert::success("Berhasil", "Nilai Telah Berhasil Diinput")
            : Alert::error("Error", "Nilai Gagal Diinput");
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
}
