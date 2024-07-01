<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;
    public $show = 'hidden';
    public $product_id, $name, $description, $file_product, $product_img, $price;
    public function rules(){
        return [
            'name'          => 'required|string',
            'description'   => 'nullable|string',
            'price'         => 'required|integer|min:0',
            'file_product'  => 'nullable|mimes:jpg,png,jpeg|max:1024',
        ];
    }

    public $listeners = ['edit_product' => 'editModal'];
    public function editModal($id){
        $product = Product::find($id);
        $this->product_id = $product->id;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->product_img = $product->product_img;
        $this->show = 'block';
    }

    public function update($id){
        $validatedData = $this->validate();
        $product = Product::find($id);

        if($this->file_product != null){
            $filename = Str::random(40) . '.' . $this->file_product->getClientOriginalExtension();
            $this->file_product->storeAs('public/product', $filename);
            $validatedData['product_img'] = $filename;
        }

        $product->fill($validatedData);
        $product->save();
        $this->emit('refresh_alert', [
            'show' => 1, 
            'msg' => 'Berhasil mengupdate data ' . $this->name,
            'theme' => 'info',
            'title' => 'Info'
        ]);
        $this->emit('refresh_product_table');
        $this->show = 'hidden';
    }
    public function render() {
        return view('livewire.product.update');
    }
}
