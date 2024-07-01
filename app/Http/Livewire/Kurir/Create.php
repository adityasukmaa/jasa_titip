<?php

namespace App\Http\Livewire\Kurir;

use App\Models\Cabang;
use App\Models\Kurir;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $full_name, $address_ktp, $address_now, $file_ktp, $file_profile, $wa_number, $cabang_id, $password;
    public $cabangs = [];
    public function rules(){
        return [
            'full_name'     => 'required|string',
            'address_ktp'   => 'required|string',
            'address_now'   => 'required|string',
            'file_ktp'      => 'required|mimes:jpg,png,jpeg|max:1024',
            'file_profile'  => 'required|mimes:jpg,png,jpeg|max:1024',
            'wa_number'     => 'required|string|starts_with:628|unique:kurirs,wa_number',
            'password'      => 'required|string',
            'cabang_id'     => [ Rule::requiredIf(auth()->user()->role == 'superadmin'), 'nullable','exists:cabangs,id']
        ];
    }
    public function mount(){
        $this->cabangs = Cabang::all();
    }
    public function store(){
        $validatedData = $this->validate();

        $ktp_filename = Str::random(40) . '.' . $this->file_ktp->getClientOriginalExtension();
        $profile_filename = Str::random(40) . '.' . $this->file_profile->getClientOriginalExtension();

        $this->file_ktp->storeAs('public/kurir', $ktp_filename);
        $this->file_profile->storeAs('public/kurir', $profile_filename);

        $validatedData['ktp_img'] = $ktp_filename;
        $validatedData['profile_img'] = $profile_filename;
        // cabang_id for admin
        if(auth()->user()->role == 'admin'){
            $validatedData['cabang_id'] = auth()->user()->cabang->id;
        }
        Kurir::create($validatedData);
        $this->resetExcept('cabangs');
        $this->emit('refresh_alert', [
            'show' => 1, 
            'msg' => 'Berhasil menambahkan Kurir '. $this->full_name,
            'theme' => 'success',
            'title' => 'Info'
        ]);
        $this->emit('refresh_kurir_table');

    }

    public function render(){
        return view('livewire.kurir.create');
    }
}
