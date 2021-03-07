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
        public $kelasRepo,$subjectRepo;

        public function __construct(KelasRepository $kelas, SubjectRepository $subject)
        {
            $this->kelasRepo = $kelas;
            $this->subjectRepo = $subject;
        }
        // --------------------- NILAI ---------------------------
        public function getKelasNilai() {
            $classes = $this->kelasRepo->getKelas();
            $view="content.".Auth::user()->role->role.".nilai.kelas";
            return view($view,compact("classes"));
        }

        public function getKelasMemberNilai(ClassRoom $class) {
            $students = $class->students;
            $view="content.".Auth::user()->role->role.".nilai.member";
            return view($view,compact("students","class"));
        }

        public function getInputNilai(ClassRoom $class, Student $student) {
            $subjects = $this->subjectRepo->getSubjects();
            $view="content.".Auth::user()->role->role.".nilai.input";
            return view($view,compact("class","student","subjects"));
        }

        public function postInputNilai(Student $student,Request $request) {
            $request->validate([
                "nilai" => ["gte:0","lte:100"]
            ]);
            $created = $this->subjectRepo->inputNilai($student->user_id,Auth::user()->id,
            $student->class_id,date("Y"),$request->all());
            isset($created)
            ? Alert::success("Berhasil", "Nilai Telah Berhasil Diinput")
            : Alert::error("Error", "Nilai Gagal Diinput");
            return redirect()->back();
        }

        public function viewNilaiKelas() {
            $classes = $this->kelasRepo->getKelas();
            $view="content.".Auth::user()->role->role.".nilai.kelas";
            return view($view,compact("classes"));
        }

        public function getDetailNilai(ClassRoom $class, Request $request) {
            $students = $class->students;
            $view="content.".Auth::user()->role->role.".nilai.member";
            return view($view,compact("students","class"));
        }

        public function getNilaiDetail(Request $request,ClassRoom $class, Student $student) {
            $values = $this->subjectRepo->getDetailNilai($request->mapel,$request->semester,$class->id,$student->user_id);
            $subjects = $this->subjectRepo->getSubjects();
            $view="content.".Auth::user()->role->role.".nilai.detail";
            return view($view,compact("values","subjects","class","student"));
        }
}
