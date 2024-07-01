<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function toko(){
        return $this->belongsTo(Toko::class, 'toko_id', 'id');
    }
}
