<?php

namespace App\Http\Livewire\Cabang;

use App\Models\Cabang;
use Livewire\Component;

class Update extends Component
{
    public $show = 'hidden';
    public $cabang_id, $name, $keterangan;
    public $rules = [
        'name'          => 'required|string',
        'keterangan'    => 'string'
    ];

    public $listeners = ['edit_cabang' => 'editModal'];
    public function editModal($id){
        $cabang = Cabang::find($id);
        $this->cabang_id = $cabang->id;
        $this->name = $cabang->name;
        $this->keterangan = $cabang->keterangan;
        $this->show = 'block';
    }

    public function update($id){
        $validatedData = $this->validate();
        $cabang = Cabang::find($id);
        $cabang->fill($validatedData);
        $cabang->save();
        $this->emit('refresh_alert', [
            'show' => 1, 
            'msg' => 'Berhasil mengupdate data ',
            'theme' => 'info',
            'title' => 'Info'
        ]);
        $this->emit('refresh_cabang_table');
        $this->show = 'hidden';
    }
    public function render()
    {
        return view('livewire.cabang.update');
    }
}
