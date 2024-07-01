<?php

namespace App\Http\Livewire\Admin;

use App\Models\Cabang;
use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $full_name, $username, $wa_number, $password, $file, $note, $cabang_id;
    public $cabangs = [];
    public $rules = [
        'full_name'     => 'required|string',
        'username'      => 'required|string|unique:users,username',
        'wa_number'     => 'required|string|starts_with:628|unique:users,wa_number',
        'password'      => 'required|string|min:6',
        'file'          => 'required|mimes:jpg,png,jpeg|max:1024',
        'note'          => 'nullable|string',
        'cabang_id'     => 'required|exists:cabangs,id'
    ];
    public function mount(){
        $this->cabangs = Cabang::all();
    }
    public function store(){
        $validatedData = $this->validate();
        $filename = Str::random(40) . '.' . $this->file->getClientOriginalExtension();
        $path = $this->file->storeAs('public/profile', $filename);
        $storedFilename = basename($path);
        $validatedData['img_name'] = $storedFilename;
        $validatedData['role']     = 'admin';

        User::create($validatedData);
        $this->resetExcept('cabangs');
        $this->emit('refresh_alert', [
            'show' => 1, 
            'msg' => 'Berhasil menambahkan Admin '. $this->full_name,
            'theme' => 'success',
            'title' => 'Info'
        ]);
        $this->emit('refresh_admin_table');

    }

    public function render(){
        return view('livewire.admin.create');
    }
}
