<?php

namespace App\Http\Livewire\Ads;

use App\Models\Ads;
use Livewire\Component;

class Delete extends Component
{
    public $show = 'hidden';
    public $name, $ads_id;

    protected $listeners = ['delete_ads' => 'confirm'];

    public function confirm($id, $name){
        $this->show = 'block';
        $this->ads_id = $id;
        $this->name = $name;
    }
    public function destroy($id){
        Ads::destroy($id);
        $this->show = 'hidden';
        $this->emit('refresh_ads_table');
        $this->emit('refresh_alert', [
            'show' => 1, 
            'msg' => 'Berhasil meghapus data Iklan '. $this->name,
            'theme' => 'info',
            'title' => 'Info'
        ]);
       
    }
    public function render() {
        return view('livewire.ads.delete');
    }
}
