<?php

namespace App\Http\Controllers;

use App\Models\Kurir;
use Illuminate\Http\Request;

class KurirController extends Controller
{
    public function index(){
        return view('pages.admin.kurir');
    }
    public function cekSaldoPage(Request $req){
        $kurirSes = session()->get('kurir');
        if($kurirSes != null){
            $kurir = Kurir::where('wa_number', $kurirSes['wa_number'])->firstOrFail();
            return view('pages.courir.cek-saldo', ['kurir' => $kurir]);
        }else{
            return view('pages.courir.cek-saldo-form');
        }
    }
    public function auth(Request $req){
        $req->validate([
            'wa_number' => 'required|string',
            'password'  => 'required|string'
        ]);

        $kurir = Kurir::where('wa_number', $req->wa_number)->where('password', $req->password)->first();
        if($kurir == null){
            return redirect()->back()->withErrors([
                'wa_number' => 'Nomor WA atau Password Salah!',
                'password' => 'Nomor WA atau Password Salah!'
            ])->withInput();
        }else{
            session()->put('kurir', ['wa_number' => $kurir->wa_number]);
            return redirect()->route('courir.cekSaldo');
        }
    }
    public function toggleStatus(Request $req){
        $kurir_session = session()->get('kurir');
        $kurir = Kurir::where('wa_number', $kurir_session['wa_number'])->first();
        $kurir->is_active = !$kurir->is_active;
        $kurir->save();
        return redirect()->back();
    }
}
