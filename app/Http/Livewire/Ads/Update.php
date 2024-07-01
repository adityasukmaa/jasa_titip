<?php

namespace App\Http\Livewire\Ads;

use App\Models\Ads;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;
    public $show = 'hidden';
    public $ads_id, $name, $banner_img, $file_banner, $is_active=1, $link;
    public $statuses = [
        [
            'value' => 1,
            'label' => 'Aktif'
        ],
        [
            'value' => 0,
            'label' => 'Non-Aktif'
        ],
    ];
    public function rules(){
        return [
            'name'          => 'required|string',
            'is_active'     => 'required|boolean',
            'file_banner'   => 'nullable|mimes:jpg,png,jpeg|max:1024',
            'link'          => 'required|string|url'

        ];
    }

    public $listeners = ['edit_ads' => 'editModal'];
    public function editModal($id){
        $ads = Ads::find($id);
        $this->ads_id = $ads->id;
        $this->name = $ads->name;
        $this->link = $ads->link;
        $this->banner_img = $ads->banner_img;
        $this->show = 'block';
    }

    public function update($id){
        $validatedData = $this->validate();
        $ads = Ads::find($id);
        if($this->file_banner != null){
            $filename = Str::random(40) . '.' . $this->file_banner->getClientOriginalExtension();
            $this->file_banner->storeAs('public/iklan', $filename);
            $validatedData['banner_img'] = $filename;
        }
       
        $ads->fill($validatedData);
        $ads->save();
        $this->emit('refresh_alert', [
            'show' => 1, 
            'msg' => 'Berhasil mengupdate data ' . $this->name,
            'theme' => 'info',
            'title' => 'Info'
        ]);
        $this->emit('refresh_ads_table');
        $this->show = 'hidden';
    }
    public function render() {
        return view('livewire.ads.update');
    }
}
