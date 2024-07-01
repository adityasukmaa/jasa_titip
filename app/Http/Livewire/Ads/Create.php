<?php

namespace App\Http\Livewire\Ads;

use App\Models\Ads;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $name, $file_banner, $link;
    public function rules(){
        return [
            'name'          => 'required|string',
            'file_banner'   => 'required|mimes:jpg,png,jpeg|max:1024',
            'link'          => 'required|string|url'
        ];
    }
  
    public function store(){
        $validatedData = $this->validate();
        $banner_filenane = Str::random(40) . '.' . $this->file_banner->getClientOriginalExtension();

        $this->file_banner->storeAs('public/iklan', $banner_filenane);
        $validatedData['banner_img'] = $banner_filenane;
        $validatedData['is_active'] = true;

        Ads::create($validatedData);
        $this->reset();
        $this->emit('refresh_alert', [
            'show' => 1, 
            'msg' => 'Berhasil menambahkan Iklan '. $this->name,
            'theme' => 'success',
            'title' => 'Info'
        ]);
        $this->emit('refresh_ads_table');

    }
    public function render() {
        return view('livewire.ads.create');
    }
}
