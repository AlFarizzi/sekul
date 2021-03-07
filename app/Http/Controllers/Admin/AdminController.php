<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PegawaiRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Repo\AdminRepository;

class AdminController extends Controller
{

    public $adminRepo;

    public function __construct(AdminRepository $admin)
    {
        $this->adminRepo = $admin;
    }

    public function adminIndex() {
        return view("content.admin.index");
    }

    // ---------------- ADMIN ---------------------

    public function getAdmins() {
        $admins = $this->adminRepo->getAdmins();
        return view("content.admin.admin.admins",compact("admins"));
    }

    public function getPostAdmin() {
        return view("content.admin.admin.tambah");
    }

    public function postAdmin(PegawaiRequest $request) {
        $input = $request->all();
        $input["role_id"] = 1;
        $input["photo_profile"] = "https://source.unsplash.com/random";
        $created = $this->adminRepo->postAdmin($request->all());
        isset($created)
        ? Alert::success("Berhasil", "Admin Baru Berhasil Ditambahkan")
        : Alert::error("Error", "Admin Baru Gagal Ditambahkan");
        return redirect()->route("adminGetAdmins");
    }

    public function deleteAdmin(Admin $admin) {
        $deleted = $this->adminRepo->deleteAdmin($admin);
        $deleted
        ? Alert::success("Berhasil", "Admin Berhasil Dihapus Pada ". date("m/d/Y H:i:s"))
        : Alert::error("Error", "Admin Gagal Dihapus");
        return redirect()->back();
    }

    public function updateAdmin(Admin $admin) {
        $target = $admin;
        return view("content.admin.admin.update",compact("target"));
    }

    public function updateeAdmin(Request $request, Admin $admin) {
        $updated = $this->adminRepo->updateAdmin($admin,$request->all());
        $updated
        ? Alert::success("Berhasil", "Data Admin Berhasil Dihapus Pada ". date("m/d/Y H:i:s"))
        : Alert::error("Error", "Data Admin Gagal Dihapus");
        return redirect()->route("adminGetAdmins");
    }
}

