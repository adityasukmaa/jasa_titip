<?php

namespace App\Http\Livewire\Order;

use App\Models\Order;
use Livewire\Component;

class Delete extends Component
{
    public $show = 'hidden';
    public $name, $order_id;

    protected $listeners = ['delete_order' => 'confirm'];

    public function confirm($id){
        $this->show = 'block';
        $this->order_id = $id;
    }
    public function destroy($id){
        Order::destroy($id);
        $this->show = 'hidden';
        $this->emit('refresh_table');
        $this->emit('refresh_alert', [
            'show' => 1, 
            'msg' => 'Berhasil meghapus data order ',
            'theme' => 'info',
            'title' => 'Info'
        ]);
    }
    public function render(){
        return view('livewire.order.delete');
    }
}
