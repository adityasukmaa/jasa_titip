<?php

namespace App\Http\Livewire\Auth;

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangePassword extends Component
{
    public $old_password, $new_password, $new_password_confirmation;
    public function rules(){
        return [
            'old_password'  => 'required',
            'new_password'  => 'required|string|min:6|confirmed',
        ];
    }
    public function store(){
        $user = auth()->user();
        if (Hash::check($this->old_password, $user->password)) {
            $user->password = $this->new_password;
            $user->save();
            Auth::logout();
            return redirect()->route('loginPage');
        }else{
            $this->emit('refresh_alert', [
                'show' => 1, 
                'msg' => 'Password Lama Salah!',
                'theme' => 'danger',
                'title' => 'Info'
            ]);
        }
    }
    public function render() {
        return view('livewire.auth.change-password');
    }
}
