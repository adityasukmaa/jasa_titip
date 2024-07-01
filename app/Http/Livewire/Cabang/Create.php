<?php

namespace App\Http\Livewire\Cabang;

use App\Models\Cabang;
use Livewire\Component;

class Create extends Component
{
    public $name, $keterangan;
    public $rules = [
        'name'          => 'required|string',
        'keterangan'    => 'string'
    ];
    public function store(){
        $validatedData = $this->validate();
        Cabang::create($validatedData);
        $this->reset();
        $this->emit('refresh_alert', [
            'show' => 1, 
            'msg' => 'Berhasil menambahkan Cabang '. $this->name,
            'theme' => 'success',
            'title' => 'Info'
        ]);
        $this->emit('refresh_cabang_table');

    }
    
    public function render(){
        return view('livewire.cabang.create');
    }
}
