<?php

namespace App\Http\Livewire\TopupKurir;


use App\Models\Kurir;
use App\Models\User;
use Livewire\Component;

class KurirTable extends Component
{
    public $kurirs = [];
    public $saldo = 0;
    public function mount(){
        $this->kurirs = Kurir::where('cabang_id', auth()->user()->cabang_id)->get();
        $this->saldo = auth()->user()->saldo;
    }
    protected $listeners = ['refresh_kurir_table' => 'refresh'];
    public function refresh(){
        $this->kurirs = Kurir::where('cabang_id', auth()->user()->cabang_id)->get();
        $this->saldo = auth()->user()->saldo;

    }

    public function topup($id){
        $this->emit('topup_kurir', $id);
    }
    public function render() {
        return view('livewire.topup-kurir.kurir-table');
    }
}
