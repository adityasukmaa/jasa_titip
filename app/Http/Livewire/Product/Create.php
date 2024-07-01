<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $toko_id, $name, $description, $file_product, $price;
    public function rules(){
        return [
            'name'          => 'required|string',
            'description'   => 'nullable|string',
            'price'         => 'required|integer|min:0',
            'file_product'  => 'required|mimes:jpg,png,jpeg|max:1024',
        ];
    }
    public function store(){
        $validatedData = $this->validate();

        $product_filename = Str::random(40) . '.' . $this->file_product->getClientOriginalExtension();
        $this->file_product->storeAs('public/product', $product_filename);
        $validatedData['product_img'] = $product_filename;

        $validatedData['toko_id'] = $this->toko_id;
        Product::create($validatedData);
        $this->resetExcept('toko_id');
        $this->emit('refresh_alert', [
            'show' => 1, 
            'msg' => 'Berhasil menambahkan Produk '. $this->name,
            'theme' => 'success',
            'title' => 'Info'
        ]);
        $this->emit('refresh_product_table');

    }
    public function render() {
        return view('livewire.product.create');
    }
}
