<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopUpController extends Controller{
    public function superadmin(){
        return view('pages.admin.superadmin-topup');
    }
    public function admin(){
        return view('pages.admin.admin-topup');
    }
}
