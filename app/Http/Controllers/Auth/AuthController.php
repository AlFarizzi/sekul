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
