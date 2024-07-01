<?php

namespace App\Http\Livewire\Topup;

use App\Models\TopUpHistory;
use App\Models\User;
use Livewire\Component;

class Modal extends Component
{
    public $show = 'hidden';
    public $admin_id, $amount, $price;
    public $listeners = ['topup_admin' => 'topupModal'];
    public function topupModal($id){
        $admin = User::find($id);
        $this->admin_id = $admin->id;
        $this->show = 'block';
    }
    public function update($id){
        $this->validate([
            'amount' => 'required|integer|min:0',
            'price' => 'required|integer|min:0',
        ]);

        $admin = User::find($id);
        $admin->saldo = $this->amount + $admin->saldo;
        $admin->save();
        TopUpHistory::create([
            'topup'     => $this->amount,
            'price'     => $this->price,
            'user_id'   => auth()->user()->id,
            'type'      => 'admin'
        ]);
        $this->reset();
        $this->emit('refresh_alert', [
            'show' => 1, 
            'msg' => 'Berhasil melakukan Topup ',
            'theme' => 'info',
            'title' => 'Info'
        ]);
        $this->emit('refresh_admin_table');
        $this->show = 'hidden';
    }
    public function render(){
        return view('livewire.topup.modal');
    }
}
