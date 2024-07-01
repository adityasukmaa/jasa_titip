<?php

namespace App\Http\Livewire\CourirReport;

use App\Models\Kurir;
use Carbon\Carbon;
use Livewire\Component;

class Table extends Component
{
    public $courirs = [];
    public $date_start, $date_end;
    public function mount(){
        // $this->minimumDate = Carbon::now()->subDays(7)->format('Y-m-d H:i:s');
        $this->date_start =  Carbon::now()->format('Y-m-d');
        $this->date_end =  Carbon::now()->format('Y-m-d');
        // $this->date_range = $this->date_start . '|' . $this->date_end;
        $this->courirs = Kurir::with(['orders' => function ($query) {
            $query->where('status', 'done')->whereDate('created_at', '>=', $this->date_start)->whereDate('created_at', '<=', $this->date_end);
        }])->where('cabang_id', auth()->user()->cabang_id)->get();
    }
        
    protected $listeners = ['dateChange' => 'dateChange'];
    public function dateChange($date_range){
        $date = explode('|',$date_range);
        $date_start = $date[0];
        $date_end = $date[1];
        $this->courirs = Kurir::with(['orders' => function ($query) use ($date_start, $date_end) {
            $query->where('status', 'done')->whereDate('created_at', '>=', $date_start)->whereDate('created_at', '<=', $date_end);
        }])->where('cabang_id', auth()->user()->cabang_id)->get();
    }
    public function render(){
        return view('livewire.courir-report.table');
    }
}
