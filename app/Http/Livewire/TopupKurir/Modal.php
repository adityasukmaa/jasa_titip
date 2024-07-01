<?php

namespace App\Http\Livewire\TopupKurir;

use App\Models\Kurir;
use App\Models\TopUpHistory;
use App\Models\User;
use Livewire\Component;

class Modal extends Component
{
    public $show = 'hidden';
    public $kurir_id, $amount, $price;
    public $listeners = ['topup_kurir' => 'topupModal'];
    public function topupModal($id){
        $kurir = Kurir::find($id);
        $this->kurir_id = $kurir->id;
        $this->show = 'block';
    }
    public function rules(){
        return [
            'amount' => ['required','integer', 'min:0', function ($attribute, $value, $fail) {
                $maxValue = auth()->user()->saldo;
                if ($value > $maxValue) {
                    $fail('Saldo Tidak Mencukupi');
                }
            }],
            'price' => ['required','integer', 'min:0'],
        ];
    }
    public function update($id){
        $this->validate();
        $kurir = Kurir::find($id);
        $kurir->saldo = $this->amount + $kurir->saldo;
        $kurir->save();

        $user = auth()->user();
        $user->saldo -= $this->amount;
        $user->save();
        
        TopUpHistory::create([
            'topup'     => $this->amount,
            'price'     => $this->price,
            'user_id'   => auth()->user()->id,
            'type'      => 'kurir'
        ]);
        $this->reset();
        $this->emit('refresh_alert', [
            'show' => 1, 
            'msg' => 'Berhasil melakukan Topup ',
            'theme' => 'info',
            'title' => 'Info'
        ]);
        $this->emit('refresh_kurir_table');
        $this->show = 'hidden';
    }
    public function render(){
        return view('livewire.topup-kurir.modal');
    }
}
