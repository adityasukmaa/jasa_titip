<?php

namespace App\Http\Livewire\Order;

use App\Models\Kurir;
use App\Models\Order;
use App\Models\Setting;
use App\Models\Toko;
use Livewire\Component;

class Modal extends Component
{
    public $show = 'hidden';
    public $order_id;
    public $kurirs = [];
    public $kurir_id, $courir_wa, $toko_wa, $customer_wa;
    public $isChatDone = false, $counter = 0;
    public $tokoMsg, $kurirMsg, $customerMsg;

    public function updatedKurirId(){
        $kurir = Kurir::find($this->kurir_id);
        // dd()
        $kurir_name = $kurir->full_name;
        $kurir_wa = $kurir->wa_number;
        $this->courir_wa = $kurir_wa;
        $grand_total = 0;
        // $kurir_fee = intval(Setting::where('key', 'courir_fee')->firstOrFail()->value);
        // $grand_total += $kurir_fee;
        // $kurir_fee = number_format($kurir_fee, 0, ',', '.');
        $app_fee = intval(Setting::where('key', 'app_fee')->firstOrFail()->value);
        $grand_total += $app_fee;
        $app_fee = number_format($app_fee, 0, ',', '.');
        $order = Order::find($this->order_id);
        $kurir_fee = $order->courir_fee;
        $grand_total += $kurir_fee;
        $kurir_fee = number_format($kurir_fee, 0, ',', '.');
        $total = number_format($order->price, 0, ',', '.');
        $grand_total += $order->price;
        $grand_total = number_format($grand_total   , 0, ',', '.');
        $items = '';
        foreach ($order->items as $item) {
            $items = $items . "$item->qty" . 'X ' . $item->product->name . ' - Rp. ' . number_format($item->price, 0, ',', '.')  . "\n" ."     -> Rp. " . number_format($item->total, 0, ',', '.') . "\n";
        }
        $tokoMsg = "Hi! Ada order baru dari platform *SobatKurir*\n\n*Detail Order:*\n$items\n*Total:* Rp. $total\n*Kurir:* $kurir_name\n*WA:* $kurir_wa\n***\nMohon order untuk disiapkan!\n";
        $this->tokoMsg = rawurlencode($tokoMsg);

        $toko = $order->items[0]->product->toko;
        $toko_name = $toko->name;
        $toko_maps = "https://www.google.com/maps/search/?api=1&query=" . $toko->lat . ',' . $toko->long;
        $toko_address = $toko->address;
        $toko_wa = $toko->wa_number;
        $this->toko_wa = $toko_wa;

        $customer_name = $order->customer_name;
        $customer_wa = $order->customer_wa;
        $this->customer_wa = $customer_wa;
        $customer_address = $order->customer_address;
        $customer_maps = "https://www.google.com/maps/search/?api=1&query=" . $order->lat . ',' . $order->long;

        $kurirMsg = "Hi! Ada order baru dari platform *SobatKurir*\n\n*Toko:* $toko_name\n*WA:* $toko_wa\n*Alamat:* $toko_address\n*Maps:* $toko_maps\n*Detail Order:*\n$items\n*Total:* Rp. $total\n*Kurir FEE:* Rp. $kurir_fee\n*Biaya Layanan:* Rp. $app_fee\n*Grand Total:* Rp. $grand_total\n\n*Pelanggan:*\n*Nama Pelanggan:* $customer_name\n*WA:* $customer_wa\n*Alamat:* $customer_address\n*Maps:* $customer_maps\n\n*Segera Proses Orderan Ini, Kepuasan Pelanggan Adalah Hal Utama*\n_Hati-Hati Di Jalan_";
        $this->kurirMsg = rawurlencode($kurirMsg);

        $customerMsg = "Hi! *SobatKurir* di Sini, Order Kamu Sedang Di Proses Oleh Kurir, Tunggu Sebentar ya!\n\n*Toko:* $toko_name\n*Detail Order:*\n$items\n*Total:* Rp. $total\n*Kurir FEE:* Rp. $kurir_fee\n*Biaya Layanan:* Rp. $app_fee\n*Grand Total:* Rp. $grand_total\n\n";
        $this->customerMsg = rawurlencode($customerMsg);

        


    }
    public function sendMsg(){
        $this->counter += 1;
        if($this->counter >= 3){
            $this->isChatDone = true;
        }
    }
    public function done(){
        $order = Order::find($this->order_id);
        $order->status = 'processed';
        $order->courir_id = $this->kurir_id;
        $order->save();
        $this->show = 'hidden';
        $this->emit('refresh_table');
        $this->emit('refresh_alert', [
            'show' => 1, 
            'msg' => 'Berhasil memproses order',
            'theme' => 'success',
            'title' => 'Info'
        ]);
    }
    protected $listeners = ['proccess' => 'openModal'];
    public function openModal($id){
        $user = auth()->user();
        $this->order_id = $id;
        $order = Order::find($id);
        $this->kurirs = $user->cabang->kurirs()->where('saldo', '>=', $order->app_fee)->where('is_active', true)->get();
        $this->show = 'block';

    }
    public function render(){
        return view('livewire.order.modal');
    }
}
