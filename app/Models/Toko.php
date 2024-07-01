<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    use HasFactory;
    protected $table = 'tokos';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function cabang(){
        return $this->belongsTo(Cabang::class, 'cabang_id', 'id');
    }
    public function products(){
        return $this->hasMany(Product::class, 'toko_id', 'id');
    }
}
