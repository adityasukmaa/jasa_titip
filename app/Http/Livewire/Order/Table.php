<?php

namespace App\Http\Livewire\Order;

use App\Models\Order;
use Livewire\Component;

class Table extends Component
{
    public $orders = [];
    protected $listeners = ['refresh_table' => 'refresh', 'ring_bell' => 'ringBell'];
    public function ringBell(){}
    public function refresh(){
        $user = auth()->user();
        $this->orders = Order::with('items')->where('status', '!=','done')->where('cabang_id', $user->cabang->id)->get();
    }
    public function proccess($id){
        $this->emit('proccess', $id);
    }
    public function done($id){
        $order = Order::find($id);
        $order->status = 'done';
        $kurir = $order->kurir;
        $kurir->saldo -= $order->app_fee;
        $kurir->save();
        $order->save();

        $this->emit('refresh_table');
    }
    public function mount(){
        $user = auth()->user();
        $this->orders = Order::with('items')->where('status', '!=','done')->where('cabang_id', $user->cabang->id)->get();
    }
    public function ring(){
        $user = auth()->user();
        $this->orders = Order::with('items')->where('status', '!=','done')->where('cabang_id', $user->cabang->id)->get();
        $isNewOrder = $this->orders->contains(function ($order) {
            return $order->status === 'created';
        });
        if($isNewOrder){
            $this->emit('ring_bell');
        }
    }
    public function delete($id){
        $this->emit('delete_order', $id);
    }
    public function render(){
        return view('livewire.order.table');
    }
}
