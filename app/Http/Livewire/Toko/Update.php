<?php

namespace App\Http\Livewire\Toko;

use App\Models\Cabang;
use App\Models\Toko;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;
    public $show = 'hidden';
    public $toko_id, $slug,$name, $description, $wa_number, $password, $address, $latlong, $cover_img, $profile_img ,$file_cover, $file_profile, $cabang_id;
    public $cabangs = [];
    public function rules(){
        return [
            'name'          => 'required|string',
            'description'   => 'required|string',
            'wa_number'     => ['required', 'string', 'starts_with:628', Rule::unique('tokos', 'wa_number')->ignore($this->toko_id)],
            'password'      => 'required|string',
            'address'       => 'required|string',
            'latlong'       => 'required|string',
            'file_cover'    => 'nullable|mimes:jpg,png,jpeg|max:1024',
            'file_profile'  => 'nullable|mimes:jpg,png,jpeg|max:1024',
            'cabang_id'     => [Rule::requiredIf(auth()->user()->role == 'superadmin'), 'nullable','exists:cabangs,id']
        ];
    }

    public function mount(){
        $this->cabangs = Cabang::all();
    }
    public $listeners = ['edit_toko' => 'editModal'];
    public function editModal($id){
        $toko = Toko::find($id);
        $this->toko_id = $toko->id;
        $this->name = $toko->name;
        $this->description = $toko->description;
        $this->wa_number = $toko->wa_number;
        $this->password = $toko->password;
        $this->address = $toko->address;
        $this->latlong = $toko->lat . ',' . $toko->long;
        $this->cover_img = $toko->cover_img;
        $this->profile_img = $toko->profile_img;
        if(auth()->user()->role == 'superadmin'){
            $this->cabang_id = $toko->cabang_id;
        }else{
            $this->cabang_id = auth()->user()->cabang->id;
        }
        $this->show = 'block';
    }

    public function update($id){
        $validatedData = $this->validate();
        $toko = toko::find($id);

        if($this->file_cover != null){
            $filename = Str::random(40) . '.' . $this->file_cover->getClientOriginalExtension();
            $this->file_cover->storeAs('public/toko', $filename);
            $validatedData['cover_img'] = $filename;
        }
        if($this->file_profile != null){
            $filename = Str::random(40) . '.' . $this->file_profile->getClientOriginalExtension();
            $this->file_profile->storeAs('public/toko', $filename);
            $validatedData['profile_img'] = $filename;
        }

        //latlong extract
        $latlong = explode(',', str_replace(' ', '', $this->latlong));
        $validatedData['lat'] = floatval($latlong[0]);
        $validatedData['long'] = floatval($latlong[1]);
        // slug
        $validatedData['slug'] = Str::slug($validatedData['name'], '_');

        $toko->fill($validatedData);
        $toko->save();
        $this->emit('refresh_alert', [
            'show' => 1, 
            'msg' => 'Berhasil mengupdate data ' . $this->name,
            'theme' => 'info',
            'title' => 'Info'
        ]);
        $this->emit('refresh_toko_table');
        $this->show = 'hidden';
    }
    public function render() {
        return view('livewire.toko.update');
    }
}
