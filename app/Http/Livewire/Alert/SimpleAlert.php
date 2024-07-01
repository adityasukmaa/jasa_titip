<?php

namespace App\Http\Livewire\Alert;

use Livewire\Component;

class SimpleAlert extends Component
{
    public $msg;
    public $show = 0;
    public $theme = 'success';
    public $title = 'info';


    protected $listeners = ['refresh_alert' => 'refresh'];

    public function refresh($params){
        $this->msg = $params['msg'];
        $this->show = $params['show'];
        $this->theme = $params['theme'];
        $this->title = $params['title'];

    }
    public function render(){
        return view('livewire.alert.simple-alert');
    }
}