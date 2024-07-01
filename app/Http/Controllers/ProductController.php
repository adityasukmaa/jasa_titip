<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Toko $toko){
        $user =  auth()->user();
        if($user->role == 'admin' && $user->cabang->id !== $toko->cabang->id){
            return redirect()->back();
        }
        return view('pages.admin.product', ['toko' => $toko]);
    }
}
