<?php

namespace App\Http\Livewire\Toko;

use App\Models\Toko;
use Livewire\Component;

class Delete extends Component
{

    public $show = 'hidden';
    public $name, $toko_id;
    protected $listeners = ['delete_toko' => 'confirm'];

    public function confirm($id, $name){
        $this->show = 'block';
        $this->toko_id = $id;
        $this->name = $name;
    }
    public function destroy($id){
        Toko::destroy($id);
        $this->show = 'hidden';
        $this->emit('refresh_toko_table');
        $this->emit('refresh_alert', [
            'show' => 1, 
            'msg' => 'Berhasil meghapus data Toko '. $this->name,
            'theme' => 'info',
            'title' => 'Info'
        ]);
    }
    public function render(){
        return view('livewire.toko.delete');
    }
}
