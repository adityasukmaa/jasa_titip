<?php

namespace App\Http\Livewire\Topup;

use App\Models\TopUpHistory;
use App\Models\User;
use Livewire\Component;

class HistoryTable extends Component
{
    public $histories = [];
    protected $listeners = ['refresh_admin_table' => 'refresh'];

    public function mount(){
        $this->histories = auth()->user()->topups()->latest()->get();
    }
    public function refresh(){
        $this->histories = auth()->user()->topups()->latest()->get();
    }
    public function render(){
        return view('livewire.topup.history-table');
    }
}
