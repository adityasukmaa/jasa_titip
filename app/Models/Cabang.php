<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    use HasFactory;
    protected $table = 'cabangs';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function admins(){
        return $this->hasMany(User::class, 'cabang_id', 'id');
    }
    public function kurirs(){
        return $this->hasMany(Kurir::class, 'cabang_id', 'id');
    }
    public function tokos(){
        return $this->hasMany(Toko::class, 'cabang_id', 'id');
    }
    public function orders(){
        return $this->hasMany(Order::class, 'cabang_id', 'id');
    }
}
