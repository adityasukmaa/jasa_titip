<?php

namespace App\Http\Livewire\Catalog;

use Livewire\Component;

class Modal extends Component
{
    public $name = '', $qty, $product_id, $orders;
    public function mount(){
        $first_order_id = session()->get('first_order_id');
        if($first_order_id != null){
            $this->orders[$first_order_id] = 1;
        }
    }
    protected $listeners = ['openModal' => 'open', 'counter_changed' => 'refresh'];
    public function open($id, $name){
        $this->product_id = $id;
        $this->name = $name;
        $this->qty = $this->orders[$id] ?? 0 ;
    }
    public function refresh($id, $orders){
        if(isset($orders[$id])){
            $this->qty = $orders[$id];
        }else{
            $this->qty = 0;
        }
        $this->orders = $orders;
    }
    public function inc(){
        $this->emit('inc', $this->product_id);
    }
    public function dec(){
        $this->emit('dec', $this->product_id);
    }
  
    public function render() {
        return view('livewire.catalog.modal');
    }
}
