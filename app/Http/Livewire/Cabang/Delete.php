<?php

namespace App\Http\Livewire\Cabang;

use App\Models\Cabang;
use Livewire\Component;

class Delete extends Component
{
    public $show = 'hidden';
    public $name, $cabang_id;

    protected $listeners = ['delete_cabang' => 'confirm'];

    public function confirm($id, $name){
        $this->show = 'block';
        $this->cabang_id = $id;
        $this->name = $name;
    }
    public function destroy($id){
        Cabang::destroy($id);
        $this->show = 'hidden';
        $this->emit('refresh_cabang_table');
        $this->emit('refresh_alert', [
            'show' => 1, 
            'msg' => 'Berhasil meghapus data Cabang '. $this->name,
            'theme' => 'info',
            'title' => 'Info'
        ]);
       
    }
    public function render(){
        return view('livewire.cabang.delete');
    }
}
