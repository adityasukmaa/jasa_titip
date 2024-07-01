<?php

namespace App\Http\Livewire\Setting;

use App\Models\Setting;
use Livewire\Component;

class Table extends Component
{
    public $settings;
    public function mount(){
        $this->settings = Setting::all();
    }
    protected $listeners = ['refresh_setting_table' => 'refresh'];
    public function refresh(){
        $this->settings = Setting::all();
    }
    public function edit($id){
        $this->emit('edit_setting', $id);
    }
    public function render() {
        return view('livewire.setting.table');
    }
}
