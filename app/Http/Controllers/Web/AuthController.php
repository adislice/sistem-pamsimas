<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view("pages.login_admin");
    }

    public function loginProcess(Request $request)
    {
        $request->validate([
            "username" => "required",
            "password" => "required",
        ]);

        if (Auth::guard("petugas")->attempt($request->only(["username", "password"]))) {
            
            return redirect()->intended(route('index'))->with('toast-success', "<strong>Login Berhasil!</strong> Selamat datang " . auth('petugas')->user()->nama);
        } else {
            return redirect()
                ->back()
                ->with(
                    "alert-error",
                    "Username atau password salah. Silahkan coba lagi."
                );
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route("login");
    }

    // public function username()
    // {
    //     return 'username';
    // }
}
