<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasUlids;
    protected $table = 'orders';
    protected $keyType = 'string';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function items(){
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }
    public function cabang(){
        return $this->belongsTo(Cabang::class, 'cabang_id', 'id');
    }
    public function kurir(){
        return $this->belongsTo(Kurir::class, 'courir_id', 'id');
    }
    use HasFactory;
}
