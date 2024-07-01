<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    public function index(){
        return view('pages.admin.toko');
    }
    public function login(){
        $toko_session = session()->get('toko');
        if($toko_session != null){
           return to_route('toko.dashboard');
        }
        return view('pages.toko.login');
    }

    public function auth(Request $req){
        $req->validate([
            'wa_number' => 'required|string',
            'password'  => 'required|string'
        ]);

        $toko = Toko::where('wa_number', $req->wa_number)->where('password', $req->password)->first();
        if($toko == null){
            return redirect()->back()->withErrors([
                'wa_number' => 'Nomor WA atau Password Salah!',
                'password' => 'Nomor WA atau Password Salah!'
            ])->withInput();
        }else{
            session()->put('toko', ['wa_number' => $toko->wa_number]);
            return to_route('toko.dashboard');
        }
    }
    public function dashboard(){
        $toko_session = session()->get('toko');
        $toko = Toko::where('wa_number', $toko_session['wa_number'])->first();
        return view('pages.toko.dashboard', ['toko' => $toko]);
    }
    public function product(){
        $toko_session = session()->get('toko');
        $toko = Toko::where('wa_number', $toko_session['wa_number'])->first();
        return view('pages.toko.product', ['toko' => $toko]);
    }
    public function toggleStatus(){
        $toko_session = session()->get('toko');
        $toko = Toko::where('wa_number', $toko_session['wa_number'])->first();
        $toko->is_open = !$toko->is_open;
        $toko->save();
        // $toko->products()->
        return redirect()->back();
    }

}
