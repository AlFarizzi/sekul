<?php

namespace App\Http\Controllers\Auth;

use Alert;
use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function getLogin() {
        return view("auth.login");
    }

    public function postLogin(Request $request) {
        $request->validate([
            "username" => ["required"],
            "password" => ["required"]
        ]);
        if(Auth::attempt(["username" => $request->username, "password" => $request->password])){
            return redirect()->route(Auth::user()->role->role."Index");
        } else {
            Alert::error("Error", "Username / Password Salah");
            return redirect()->back();
        }
    }

    public function getUpdatePassword() {
        return view("content.profile.password");
    }

    public function updatePassword(Request $request) {
        $request->validate([
            "password" => ["required", "confirmed"],
            "password_confirmation" => ["required"]
        ]);
        if(Hash::check($request->old_password,Auth::user()->password)){
            Auth::user()->update([
                "password" => bcrypt($request->password)
            ]);
            Alert::success("Berhasil", "Update Password Berhasil Dilakukan");
            return redirect()->back();
        }
        Alert::error("Error", "Update Password Gagal Dilakukan");
        return redirect()->back();
    }

    public function updatePasswordSiswa(Request $request, User $target){
        $request->validate([
            "password" => ["required", "confirmed"],
            "password_confirmation" => ["required"]
        ]);
        $updated = $target->update([
            "password" => bcrypt($request->password)
        ]);
        $updated === true
        ? Alert::success("Berhasil", "Update Password Berhasil Dilakukan")
        : Alert::Error("Error", "Update Password Gagal Dilakukan");
        return redirect()->back();
    }

}
