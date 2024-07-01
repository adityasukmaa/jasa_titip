<?php

namespace App\Http\Livewire\Topup;

use App\Models\User;
use Livewire\Component;

class AdminTable extends Component
{
    public $admins = [];
    public function mount(){
        $this->admins = User::where('role', 'admin')->get();
    }
    protected $listeners = ['refresh_admin_table' => 'refresh'];
    public function refresh(){
        $this->admins = User::where('role', 'admin')->get();
    }

    public function topup($id){
        $this->emit('topup_admin', $id);
    }
    public function render() {
        return view('livewire.topup.admin-table');
    }
}
