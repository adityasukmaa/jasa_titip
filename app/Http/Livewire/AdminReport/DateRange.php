<?php

namespace App\Http\Livewire\AdminReport;

use Carbon\Carbon;
use Livewire\Component;

class DateRange extends Component
{
    public $date_range;
    public function mount(){
        $this->date_range =  Carbon::now()->format('Y-m-d') . '|' . Carbon::now()->format('Y-m-d');
    }
    protected $listeners = ['dateChange'];
    public function dateChange($date){
        $this->date_range = $date;
    }
    public function apply(){
        $date = explode('|',$this->date_range);
        $date_start = $date[0];
        $date_end = $date[1];
        $this->emit('refresh_table', $date_start, $date_end);
    }
    public function render()
    {
        return view('livewire.admin-report.date-range');
    }
}
