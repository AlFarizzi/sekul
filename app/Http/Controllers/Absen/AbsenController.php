<?php

namespace App\Http\Controllers\Absen;

use App\Jobs\doAbsen;
use App\Jobs\reAbsen;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Repo\AbsenRepository;
use App\Http\Controllers\Repo\KelasRepository;

class AbsenController extends Controller
{
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
            Alert::success("Berhasil", "Absen Jam ". date("H:i:s") . " Telah Berhasil Dilakukan");
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
}
