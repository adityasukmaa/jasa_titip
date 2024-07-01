<?php

namespace App\Http\Livewire\Admin;

use App\Models\Cabang;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;
    public $show = 'hidden';
    public $admin_id,$full_name, $username, $wa_number, $file, $img_name, $note, $cabang_id;
    public $cabangs = [];
    public function rules() {
        return [
            'full_name'     => 'required|string',
            'username'      => ['required', 'string',  Rule::unique('users', 'username')->ignore($this->admin_id)],
            'wa_number'     => ['required', 'string', 'starts_with:628', Rule::unique('users', 'wa_number')->ignore($this->admin_id)],
            'file'          => 'nullable|mimes:jpg,png,jpeg|max:1024',
            'note'          => 'nullable|string',
            'cabang_id'     => 'required|exists:cabangs,id'
        ];
    } 
    public function mount(){
        $this->cabangs = Cabang::all();
    }
    public $listeners = ['edit_admin' => 'editModal'];
    public function editModal($id){
        $admin = User::find($id);
        $this->admin_id = $admin->id;
        $this->full_name = $admin->full_name;
        $this->username = $admin->username;
        $this->wa_number = $admin->wa_number;
        $this->img_name = $admin->img_name;
        $this->note = $admin->note;
        $this->cabang_id = $admin->cabang_id;
        $this->show = 'block';
    }

    public function update($id){
        $validatedData = $this->validate();
        $admin = User::find($id);
        if($this->file != null){
            $filename = Str::random(40) . '.' . $this->file->getClientOriginalExtension();
            $path = $this->file->storeAs('public/profile', $filename);
            $storedFilename = basename($path);
            $validatedData['img_name'] = $storedFilename;
        }
        $admin->fill($validatedData);
        $admin->save();
        $this->emit('refresh_alert', [
            'show' => 1, 
            'msg' => 'Berhasil mengupdate data ' . $this->full_name,
            'theme' => 'info',
            'title' => 'Info'
        ]);
        $this->emit('refresh_admin_table');
        $this->show = 'hidden';
    }

    public function render(){
        return view('livewire.admin.update');
    }
}
