<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class Delete extends Component
{
    public $show = 'hidden';
    public $full_name, $admin_id;

    protected $listeners = ['delete_admin' => 'confirm'];

    public function confirm($id, $full_name){
        $this->show = 'block';
        $this->admin_id = $id;
        $this->full_name = $full_name;
    }
    public function destroy($id){
        User::destroy($id);
        $this->show = 'hidden';
        $this->emit('refresh_admin_table');
        $this->emit('refresh_alert', [
            'show' => 1, 
            'msg' => 'Berhasil meghapus data Admin '. $this->full_name,
            'theme' => 'info',
            'title' => 'Info'
        ]);
       
    }
    public function render(){
        return view('livewire.admin.delete');
    }
}
