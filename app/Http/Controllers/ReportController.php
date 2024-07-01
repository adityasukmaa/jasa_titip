<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function admin(){
        return view('pages.admin.admin-report');
    }
    public function courir(){
        return view('pages.admin.courir-report');
    }
}
