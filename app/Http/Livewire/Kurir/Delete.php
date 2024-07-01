<?php

namespace App\Http\Livewire\Kurir;

use App\Models\Kurir;
use Livewire\Component;

class Delete extends Component
{
    public $show = 'hidden';
    public $full_name, $kurir_id;

    protected $listeners = ['delete_kurir' => 'confirm'];

    public function confirm($id, $full_name){
        $this->show = 'block';
        $this->kurir_id = $id;
        $this->full_name = $full_name;
    }
    public function destroy($id){
        Kurir::destroy($id);
        $this->show = 'hidden';
        $this->emit('refresh_kurir_table');
        $this->emit('refresh_alert', [
            'show' => 1, 
            'msg' => 'Berhasil meghapus data Kurir '. $this->full_name,
            'theme' => 'info',
            'title' => 'Info'
        ]);
    }
    public function render(){
        return view('livewire.kurir.delete');
    }
}
