<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PegawaiRequest;
use App\Http\Controllers\Repo\AdminRepository;

class AdminController extends Controller
{
    public function adminIndex() {
        return view("content.admin.index");
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
}

