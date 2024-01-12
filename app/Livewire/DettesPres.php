<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Dette;
use Livewire\Component;
use App\Livewire\Dettes;
use Livewire\Attributes\On;

class DettesPres extends Component
{

     public $ids;

     public $deps = [];

    public $day1;
    public $day2;
    public $date;

    public $t_month = false;
    public $p_month = false;
    public $t_week = false;

    public $all = false;
    
     
    public function mount()
    {
        $now = Carbon::now();
        $from = $now->startOfMonth()->format('Y-m-d') ;
        $to = $now->endOfMonth()->format('Y-m-d') ;


        $this->date =[$from, $to];

        $this->t_month = true;
        $this->p_month = false;
        $this->all = false;
        $this->t_week = false;
    }
      public function thisMonth()
      {
        $now = Carbon::now();
        $from = $now->startOfMonth()->format('Y-m-d') ;
        $to = $now->endOfMonth()->format('Y-m-d') ;



        $this->date =[$from, $to];
        
        $this->reset(['day1','day2',]);

        $this->t_month = true;
        $this->p_month = false;
        $this->all = false;
        $this->t_week = false;

      }

      public function thisWeek()
      {
        $now = Carbon::now();
        $from = $now->startOfWeek()->format('Y-m-d') ;
        $to = $now->endOfWeek()->format('Y-m-d') ;


        $this->date =[$from, $to];
        $this->reset(['day1','day2',]);

        $this->t_month = false;
        $this->p_month = false;
        $this->all = false;
        $this->t_week = true;

      }

      public function randday()
      {
        $from = Carbon::parse($this->day1)->format('Y-m-d');
        $to = Carbon::parse($this->day2)->format('Y-m-d');


        $this->date =[$from, $to];

        $this->t_month = false;
        $this->p_month = false;
        $this->all = false;
        $this->t_week = false;

      }

      public function pastMonth()
      {
        $now = Carbon::now();
        $from = $now->startOfMonth()->subMonth()->format('Y-m-d') ;
        $to = $now->endOfMonth()->format('Y-m-d') ;



        $this->date =[$from, $to];
        $this->reset(['day1','day2',]);


        $this->t_month = false;
        $this->p_month = true;
        $this->all = false;
        $this->t_week = false;

      }

      public function alls()
      {
          $now = Carbon::now();
          $from = Carbon::parse('1-1-2000')->format('Y-m-d') ;
          $to = $now->format('Y-m-d') ;
          $this->date =[$from, $to];
  
          $this->t_month = false;
          $this->p_month = false;
          $this->all = true;
          $this->t_week = false;
      }


      

    #[On('refresh')] 
    public function render()
    {
       // $paiements = EmpSal::where('emp_id',$this->ids)->whereBetween('date', $this->date)->get();

       $detts = Dette::whereBetween('date', $this->date)->get();

        return view('livewire.dettes-pres',['detts'=>$detts]);
    }
}
