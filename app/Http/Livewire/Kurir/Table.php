<?php

namespace App\Http\Livewire\Kurir;

use App\Models\Kurir;
use Livewire\Component;

class Table extends Component
{
    public $kurirs = [];
    public function mount(){
        $user = auth()->user();
        if($user->role == 'superadmin'){
            $this->kurirs = Kurir::orderBy('cabang_id', 'DESC')->orderBy('id', 'DESC')->get();
        }else if($user->role == 'admin'){
            $this->kurirs = Kurir::where('cabang_id', $user->cabang->id)->orderBy('cabang_id', 'DESC')->orderBy('id', 'DESC')->get();
        }
    }
    protected $listeners = ['refresh_kurir_table' => 'refresh'];
    public function refresh(){
        $user = auth()->user();
        if($user->role == 'superadmin'){
            $this->kurirs = Kurir::orderBy('cabang_id', 'DESC')->orderBy('id', 'DESC')->get();
        }else if($user->role == 'admin'){
            $this->kurirs = Kurir::where('cabang_id', $user->cabang->id)->orderBy('cabang_id', 'DESC')->orderBy('id', 'DESC')->get();
        }
    }

    public function edit($id){
        $this->emit('edit_kurir', $id);
    }
    public function delete($id, $full_name){
        $this->emit('delete_kurir', $id, $full_name);
    }
    public function render(){
        return view('livewire.kurir.table');
    }
}
