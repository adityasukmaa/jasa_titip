<?php

namespace App\Http\Livewire\Order;

use App\Models\Cabang;
use App\Models\Order as ModelsOrder;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Toko;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Order extends Component
{
    public $orders;
    public $customer_name, $customer_wa, $customer_address, $lat, $long, $distance, $app_fee, $courir_fee, $total, $grand_total, $cabang_id, $order_items;
    public function mount(){
        $orders = session()->get('orders');
        if($orders == null || !isset($orders)){
            return redirect()->route('front.index'); //error but work
        }
        $app_fee = Setting::where('key', 'app_fee')->firstOrFail();
        $this->app_fee = intval($app_fee->value);
        $courir_fee = Setting::where('key', 'courir_fee')->firstOrFail();
        $this->courir_fee = intval($courir_fee->value);

        // orders
        $this->orders = [];
        $this->order_items = [];
        $harga = 0;
        foreach ($orders as $id => $qty) {
            $item = Product::find($id);
            $harga += $item->price * $qty;
            array_push($this->orders, ['item' => $item, 'qty' => $qty]);
            array_push($this->order_items, [
                'product_id'        => $item->id,
                'qty'               => $qty,
                'price'             => $item->price,
                'total'             => $item->price * $qty
            ]);

        }

        //dynamic fee
        $loc = session()->get('location');
        $customer_loc = $loc['long'] . ',' . $loc['lat'];
        $toko = $this->orders[0]['item']->toko;
        $toko_loc = $toko->long . ',' . $toko->lat;
        if($loc == null || !isset($loc)){
            return redirect()->route('front.index'); //error but work
        }
        $response = Http::get("https://api.mapbox.com/directions/v5/mapbox/driving/$toko_loc;$customer_loc?access_token=pk.eyJ1IjoianVuYXJpcyIsImEiOiJjbGpqb3Y1NzYwYW1xM2tvM2xjcm4xNHN0In0.U4XLQA7Snp1mIZsddqzwng");
        // $statusCode = $response->status();
        $body = $response->json();
        if (isset($body['routes']) && count($body['routes']) > 0) {
            $this->distance = round($body['routes'][0]['distance'] / 1000, 1, PHP_ROUND_HALF_UP);
            $rounded_distance = round($this->distance, 0, PHP_ROUND_HALF_UP);
            $this->courir_fee = $rounded_distance * $this->courir_fee;
        } else {
            $this->distance = 0;
            $this->courir_fee = 0;
        }
        // harga
        $this->total = $harga;
        $this->grand_total = $harga + $this->app_fee + $this->courir_fee;
        $this->cabang_id = $this->orders[0]['item']->toko->cabang->id;
    }

    public function rules(){
        return [
            'customer_name'     => 'required|string',
            'customer_wa'       => 'required|string|starts_with:628',
            'customer_address'  => 'required|string',
            'lat'               => 'required',
            'long'              => 'required',
        ];
    }
    public function store(){
        $validatedData = $this->validate();
        $validatedData['price'] = $this->total;
        $validatedData['app_fee'] = $this->app_fee;
        $validatedData['courir_fee'] = $this->courir_fee;
        $validatedData['cabang_id'] = $this->cabang_id;
        $validatedData['status'] = 'created';
        $order = ModelsOrder::create($validatedData);
        $order->items()->createMany($this->order_items);
        session()->forget('orders');
        session()->forget('location');
        session()->put('wa_number', Cabang::find($this->cabang_id)->admins->first()->wa_number);
        redirect()->route('front.orderSuccess');
    }
    protected $listeners = ['setLoc' => 'setLoc'];
    public function setLoc($lat, $long){
        $this->lat = $lat;
        $this->long = $long;
    }
    public function render(){
        return view('livewire.order.order');
    }
}
