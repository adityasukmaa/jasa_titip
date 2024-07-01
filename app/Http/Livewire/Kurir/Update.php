<?php

namespace App\Http\Livewire\Kurir;

use App\Models\Cabang;
use App\Models\Kurir;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;
    public $show = 'hidden';
    public $kurir_id, $full_name, $address_ktp, $address_now, $ktp_img, $profile_img, $file_ktp, $file_profile, $wa_number, $password, $cabang_id;
    public $cabangs = [];
    public function rules(){
        return [
            'full_name'     => 'required|string',
            'address_ktp'   => 'required|string',
            'address_now'   => 'required|string',
            'file_ktp'      => 'nullable|mimes:jpg,png,jpeg|max:1024',
            'file_profile'  => 'nullable|mimes:jpg,png,jpeg|max:1024',
            'wa_number'     => ['required', 'string', 'starts_with:628', Rule::unique('kurirs', 'wa_number')->ignore($this->kurir_id)],
            'password'      => 'required|string',
            'cabang_id'     => [Rule::requiredIf(auth()->user()->role == 'superadmin'), 'nullable','exists:cabangs,id']
        ];
    }

    public function mount(){
        $this->cabangs = Cabang::all();
    }
    public $listeners = ['edit_kurir' => 'editModal'];
    public function editModal($id){
        $kurir = Kurir::find($id);
        $this->kurir_id = $kurir->id;
        $this->full_name = $kurir->full_name;
        $this->address_ktp = $kurir->address_ktp;
        $this->address_now = $kurir->address_now;
        $this->ktp_img = $kurir->ktp_img;
        $this->profile_img = $kurir->profile_img;
        $this->wa_number = $kurir->wa_number;
        $this->password = $kurir->password;

        if(auth()->user()->role == 'superadmin'){
            $this->cabang_id = $kurir->cabang_id;
        }else{
            $this->cabang_id = auth()->user()->cabang->id;
        }
        $this->show = 'block';
    }

    public function update($id){
        $validatedData = $this->validate();
        $kurir = Kurir::find($id);
        if($this->file_ktp != null){
            $filename = Str::random(40) . '.' . $this->file_ktp->getClientOriginalExtension();
            $this->file_ktp->storeAs('public/kurir', $filename);
            $validatedData['ktp_img'] = $filename;
        }
        if($this->file_profile != null){
            $filename = Str::random(40) . '.' . $this->file_profile->getClientOriginalExtension();
            $this->file_profile->storeAs('public/kurir', $filename);
            $validatedData['profile_img'] = $filename;
        }
        $kurir->fill($validatedData);
        $kurir->save();
        $this->emit('refresh_alert', [
            'show' => 1, 
            'msg' => 'Berhasil mengupdate data ' . $this->full_name,
            'theme' => 'info',
            'title' => 'Info'
        ]);
        $this->emit('refresh_kurir_table');
        $this->show = 'hidden';
    }
    public function render(){
        return view('livewire.kurir.update');
    }
}
