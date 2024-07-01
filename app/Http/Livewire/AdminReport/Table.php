<?php

namespace App\Http\Livewire\AdminReport;

use App\Models\Cabang;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class Table extends Component
{
    public $cabangs = [];
    public $date_start, $date_end;
    public function mount(){
        // $this->minimumDate = Carbon::now()->subDays(7)->format('Y-m-d H:i:s');
        $this->date_start =  Carbon::now()->format('Y-m-d');
        $this->date_end =  Carbon::now()->format('Y-m-d');
        // $this->date_range = $this->date_start . '|' . $this->date_end;
        if(auth()->user()->role == 'superadmin'){
            $this->cabangs = Cabang::with(['orders' => function ($query) {
                $query->where('status', 'done')->whereDate('created_at', '>=', $this->date_start)->whereDate('created_at', '<=', $this->date_end);
            }])->get();
        }else{
            $this->cabangs = Cabang::with(['orders' => function ($query) {
                $query->where('status', 'done')->whereDate('created_at', '>=', $this->date_start)->whereDate('created_at', '<=', $this->date_end);
            }])->find(auth()->user()->id);
        }
    }
        
    protected $listeners = ['dateChange' => 'dateChange'];
    public function dateChange($date_range){
        $date = explode('|',$date_range);
        $date_start = $date[0];
        $date_end = $date[1];
        if(auth()->user()->role == 'superadmin'){
            $this->cabangs = Cabang::with(['orders' => function ($query) use ($date_start, $date_end) {
                $query->where('status', 'done')->whereDate('created_at', '>=', $date_start)->whereDate('created_at', '<=', $date_end);
            }])->get();
        }else{
            $this->cabangs = Cabang::with(['orders' => function ($query) use ($date_start, $date_end) {
                $query->where('status', 'done')->whereDate('created_at', '>=', $date_start)->whereDate('created_at', '<=', $date_end);
            }])->find(auth()->user()->id);
        }
    }
    public function render(){
        return view('livewire.admin-report.table');
    }
}
