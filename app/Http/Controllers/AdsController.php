<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdsController extends Controller
{
    public function index(){
        return view('pages.admin.ads');
    }
}
