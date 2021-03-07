<?php

namespace App\Http\Controllers\Mapel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Repo\SubjectRepository;
use App\Models\Subject;

class MapelController extends Controller
{
    public $subjectRepo;

    public function __construct(SubjectRepository $subject)
    {
        $this->subjectRepo = $subject;
    }

    public function getAllMapel() {
        $subjects = $this->subjectRepo->getSubjects();
        return view("content.admin.mapel.mapel", compact("subjects"));
    }

    public function getAddSubject() {
        return view("content.admin.mapel.add");
    }

    public function addSubject(Request $request) {
        $request->validate([
            "mapel" => ["required", "unique:subjects,mapel"]
        ]);
        $posted = $this->subjectRepo->addSubject($request->all());
        $posted === true
        ? Alert::success("Berhasil", "Mata Pelajaran Baru Berhasil Ditambahkan")
        : Alert::error("Error", "Mata Pelajaran Baru Gagak Ditambahkan");
        return redirect()->route("adminGetAllMapel");
    }

    public function deleteSubject(Subject $s) {
        $deleted = $s->delete();
        $deleted === true
        ? Alert::success("Berhasil", "Mata Pelajaran Berhasil Dihapus")
        : Alert::error("Error", "Mata Pelajaran Gagal Dihapus");
        return redirect()->back();
    }

    public function editMapel(Subject $s) {
        return view("content.admin.mapel.add",compact("s"));
    }

    public function updateMapel(Request $request, Subject $s) {
        $request->validate([
            "mapel" => ["required", "unique:subjects,mapel"]
        ]);
        $updated = $this->subjectRepo->updateSubject($request->all(),$s);
        $updated === true ? Alert::success("Berhasil", "Update Mata Pelajaran Berhasil Dilakukan")
        : Alert::error("Error", "Update Mata Pelajaran Gagal Dilakukan");
        return redirect()->route("adminGetAllMapel");
    }

}
