<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getLogin() {
        return view("auth.login");
    }

    // public function redirectHandler() {
    //     $role = Auth::user()->role_id;
    //     if($role === 1) {
    //         return redirect()->route("adminIndex");
    //     } else if($role === 2) {
    //         return redirect()->route("guruIndex");
    //     } else if($role === 3) {
    //         return redirect()->route("keuanganIndex");
    //     } else {
    //         return redirect()->route("muridIndex");
    //     }
    // }

    public function postLogin(Request $request) {
        $request->validate([
            "username" => ["required"],
            "password" => ["required"]
        ]);
        if(Auth::attempt(["username" => $request->username, "password" => $request->password])){
            return redirect()->route(Auth::user()->role->role."Index");
        } else {
            return redirect()->back();
        }
    }

    public function updatePassword(Request $request, $target) {
        $request->validate([
            "password" => ["required", "confirmed"],
            "password_confirmation" => ["required"]
        ]);
        $user = User::where('id',$target)->get()[0];
        $user->update([
            "password" => bcrypt($request->password)
        ]);
        return redirect()->back();
    }

}
