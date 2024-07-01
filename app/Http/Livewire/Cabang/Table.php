<?php

namespace App\Http\Livewire\Cabang;

use App\Models\Cabang;
use Livewire\Component;

class Table extends Component
{
    public $cabangs = [];
    public function mount(){
        $this->cabangs = Cabang::all();
    }
    protected $listeners = ['refresh_cabang_table' => 'refresh'];
    public function refresh(){
        $this->cabangs = Cabang::all();
    }

    public function edit($id){
        $this->emit('edit_cabang', $id);
    }
    public function delete($id, $name){
        $this->emit('delete_cabang', $id, $name);
    }
    public function render(){
        return view('livewire.cabang.table');
    }
}
