<?php

namespace App\Http\Livewire\Catalog;

use Livewire\Component;

class OrderData extends Component
{
    public $orders = [
        1 => 2
    ];
    public function render()  {
        return view('livewire.catalog.order-data');
    }
}
