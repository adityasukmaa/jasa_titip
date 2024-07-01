<?php

namespace App\Http\Livewire\Toko;

use App\Models\Cabang;
use App\Models\Toko;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;

class Create extends Component
{

    use WithFileUploads;
    public $name, $slug, $description, $wa_number, $password, $address, $latlong, $file_cover, $file_profile, $cabang_id;
    public $cabangs = [];
    public function rules()
    {
        return [
            'name'          => 'required|string|unique:tokos,name',
            'description'   => 'required|string',
            'wa_number'     => 'required|string|starts_with:628|unique:tokos,wa_number',
            'password'      => 'required|string',
            'address'       => 'required|string',
            'file_cover'    => 'required|mimes:jpg,png,jpeg|max:1024',
            'file_profile'  => 'required|mimes:jpg,png,jpeg|max:1024',
            'cabang_id'     => [Rule::requiredIf(auth()->user()->role == 'superadmin'), 'nullable', 'exists:cabangs,id']
        ];
    }
    public function mount()
    {
        $this->cabangs = Cabang::all();
    }
    public function store()
    {
        $validatedData = $this->validate();

        //file uplaod
        $cover_filename = Str::random(40) . '.' . $this->file_cover->getClientOriginalExtension();
        $profile_filename = Str::random(40) . '.' . $this->file_profile->getClientOriginalExtension();
        $this->file_cover->storeAs('public/toko', $cover_filename);
        $this->file_profile->storeAs('public/toko', $profile_filename);
        $validatedData['cover_img'] = $cover_filename;
        $validatedData['profile_img'] = $profile_filename;

        //latlong extract

        // Slug
        $validatedData['slug'] = Str::slug($validatedData['name'], '_');
        // cabang_id for admin
        if (auth()->user()->role == 'admin') {
            $validatedData['cabang_id'] = auth()->user()->cabang->id;
        }
        Toko::create($validatedData);
        $this->resetExcept('cabangs');
        $this->emit('refresh_alert', [
            'show' => 1,
            'msg' => 'Berhasil menambahkan Toko ' . $this->name,
            'theme' => 'success',
            'title' => 'Info'
        ]);
        $this->emit('refresh_toko_table');
    }
    public function render()
    {
        return view('livewire.toko.create');
    }
}
