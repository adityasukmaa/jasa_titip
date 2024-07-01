<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function loginPage(Request $req){
        return view('auth.login');
    }
    public function login(Request $req){
        $validated = Validator::make($req->all(), [
            'username'  => 'required|string',
            'password'  => 'required|string'
        ]);
        $credentials = $validated->validated();
        if(Auth::attempt($credentials)){
            $req->session()->regenerate();
            return redirect()->route('admin.home')->with('success', 'Berhasil Login');
        }
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function logout(Request $req){
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect()->route('loginPage');
    }
    public function changePassword(){
        return view('pages.admin.change-password');
    }
}
