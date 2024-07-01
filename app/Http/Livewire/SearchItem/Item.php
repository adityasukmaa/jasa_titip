<?php

namespace App\Http\Livewire\SearchItem;

use Livewire\Component;

class Item extends Component
{
    public $products;
    public function itemClick($id, $slug){
        session()->put('first_order_id', $id);
        return redirect()->route('front.catalog', ['slug' => $slug]);
    }
    public function render()
    {
        return view('livewire.search-item.item');
    }
}
