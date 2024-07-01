<?php

namespace App\Http\Livewire\Catalog;

use Livewire\Component;

class Order extends Component
{
    public $toko, $show = false;
    protected $listeners = ['inc' => 'inc', 'dec' => 'dec', 'setLoc' => 'setLoc'];
    public $orders = [];
    public $lat, $long;
    public function mount(){
        $first_order_id = session()->get('first_order_id');
        if($first_order_id != null && $this->toko->is_open){
            $this->inc($first_order_id);
        }
    }
   
    public function inc($id){
        if (array_key_exists($id, $this->orders)) {
            $this->orders[$id] += 1;
        }else{
            $this->orders[$id] = 1;
        }
        $this->emit('counter_changed',$id, $this->orders); 
    }

    public function dec($id){
        if(isset($this->orders[$id])){
            if($this->orders[$id] == 1){
                unset($this->orders[$id]);
            }else{
                $this->orders[$id] -= 1;
            }
            $this->emit('counter_changed',$id, $this->orders); 
        }
    }
    public function del($id){
        if(isset($this->orders[$id])){
            unset($this->orders[$id]);
        } 
        $this->show = true;
        $this->emit('counter_changed',$id, $this->orders); 

    }
    public function setLoc($lat, $long){
        $this->lat = $lat;
        $this->long = $long;
    }
    public function next(){
        session()->put('orders', $this->orders);
        session()->put('location', ['lat' => $this->lat, 'long' => $this->long]);
        redirect()->route('front.order');
    }
    public function render()  {
        return view('livewire.catalog.order');
    }
}
