<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class Table extends Component
{
    public $admins = [];
    public function mount(){
        $this->admins = User::where('role', 'admin')->get();
    }
    protected $listeners = ['refresh_admin_table' => 'refresh'];
    public function refresh(){
        $this->admins = User::where('role', 'admin')->get();
    }

    public function edit($id){
        $this->emit('edit_admin', $id);
    }
    public function delete($id, $full_name){
        $this->emit('delete_admin', $id, $full_name);
    }
    public function render(){
        return view('livewire.admin.table');
    }
}
