<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getLogin() {
        return view("auth.login");
    }

    public function redirectHandler() {
        $role = Auth::user()->role_id;
        if($role === 1) {
            return redirect()->route("adminIndex");
        } else if($role === 2) {
            return redirect()->route("guruIndex");
        } else if($role === 3) {
            return redirect()->route("keuanganIndex");
        } else {
        }
    }

    public function postLogin(Request $request) {
        $request->validate([
            "username" => ["required"],
            "password" => ["required"]
        ]);
        if(Auth::attempt(["username" => $request->username, "password" => $request->password])){
            return $this->redirectHandler();
        } else {
            return redirect()->back();
        }
    }
}
