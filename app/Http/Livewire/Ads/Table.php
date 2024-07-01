<?php

namespace App\Http\Livewire\Ads;

use App\Models\Ads;
use Livewire\Component;

class Table extends Component
{
    public $ads = [];
    public function mount(){
        $this->ads = Ads::all();
    }
    protected $listeners = ['refresh_ads_table' => 'refresh'];
    public function refresh(){
        $this->ads = Ads::all();
    }

    public function edit($id){
        $this->emit('edit_ads', $id);
    }
    public function delete($id, $name){
        $this->emit('delete_ads', $id, $name);
    }
    public function render() {
        return view('livewire.ads.table');
    }
}
