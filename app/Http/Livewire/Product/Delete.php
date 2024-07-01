<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class Delete extends Component
{
    public $show = 'hidden';
    public $name, $product_id;

    protected $listeners = ['delete_product' => 'confirm'];

    public function confirm($id, $name){
        $this->show = 'block';
        $this->product_id = $id;
        $this->name = $name;
    }
    public function destroy($id){
        Product::destroy($id);
        $this->show = 'hidden';
        $this->emit('refresh_product_table');
        $this->emit('refresh_alert', [
            'show' => 1, 
            'msg' => 'Berhasil meghapus data Product '. $this->name,
            'theme' => 'info',
            'title' => 'Info'
        ]);
    }
    public function render() {
        return view('livewire.product.delete');
    }
}
