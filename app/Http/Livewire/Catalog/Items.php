<?php

namespace App\Http\Livewire\Catalog;

use Livewire\Component;

class Items extends Component
{
    public $products, $toko;

    public function openModal($id, $name){
        $this->emit('openModal', $id, $name);
    }
    public function render() {
        return view('livewire.catalog.items');
    }
}
