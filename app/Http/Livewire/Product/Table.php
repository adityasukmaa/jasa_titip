<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use App\Models\Toko;
use Livewire\Component;

class Table extends Component
{
    public $products, $toko_id;
    protected $listeners = ['refresh_product_table' => 'refresh'];
    public function refresh(){
        $this->products = Toko::find($this->toko_id)->products()->orderBy('id', 'DESC')->get();
    }
    public function edit($id){
        $this->emit('edit_product', $id);
    }
    public function delete($id, $name){
        $this->emit('delete_product', $id, $name);
    }
    public function toggleStatus($id){
        $product = Product::find($id);
        $product->is_available = !$product->is_available;
        $product->save();
        $this->refresh();

    }
    public function render() {
        return view('livewire.product.table');
    }
}
