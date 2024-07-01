<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute ;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $hidden = ['password'];
    protected $guarded = ['id'];

    public function cabang(){
        return $this->belongsTo(Cabang::class, 'cabang_id', 'id');
    }
    public function topups(){
        return $this->hasMany(TopUpHistory::class, 'user_id', 'id');
    }
    
    protected function password(): Attribute{
        return Attribute::make(
            set: fn(string $password) => Hash::make($password)
        );
    }
}
