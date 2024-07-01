<?php

namespace App\Http\Livewire\Setting;

use App\Models\Setting;
use Livewire\Component;

class Update extends Component
{
    public $show = 'hidden';
    public $setting_id, $value;
    public $listeners = ['edit_setting' => 'editModal'];
    public function editModal($id){
        $setting = Setting::find($id);
        $this->setting_id = $setting->id;
        $this->value = $setting->value;
        $this->show = 'block';
    }
    public function update($id){
        $this->validate([
            'value' => 'required|string'
        ]);
        $setting = Setting::find($id);
        $setting->value = $this->value;
        $setting->save();
        $this->emit('refresh_alert', [
            'show' => 1, 
            'msg' => 'Berhasil mengupdate data ',
            'theme' => 'info',
            'title' => 'Info'
        ]);
        $this->emit('refresh_setting_table');
        $this->show = 'hidden';
    }
    public function render(){
        return view('livewire.setting.update');
    }
}
