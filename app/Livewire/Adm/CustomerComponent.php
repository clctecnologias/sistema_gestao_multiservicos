<?php

namespace App\Livewire\Adm;

use App\Models\PersonalData;
use Livewire\Attributes\Layout;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;

class CustomerComponent extends Component
{
    public $status,$searcher,$startdate,$enddate;
    
    #[Layout('layouts.admin.app')] 
    public function render()
    {
        return view('livewire.adm.customer-component',[
            'customers' =>$this->getCustomers()
        ]);
    }

    public function getCustomers () {
        try {
         
            if ($this->searcher) {

                return PersonalData::query()->with('customer')
                ->whereNotNull('customer_uuid')
                ->where('fullname', 'like', '%' .$this->searcher.'%')
                ->get();      

            }else if ($this->startdate && $this->enddate) {
                return PersonalData::query()->with('customer')
                ->whereNotNull('customer_uuid')
                ->whereBetween('created_at', [$this->startdate,$this->enddate])
                ->get();      

            }else{
                return PersonalData::query()->with('customer')
                ->whereNotNull('customer_uuid')
                ->get();                      

            }
              
        } catch (\Throwable $th) {
            LivewireAlert::title('Erro')
            ->text('erro: ' .$th->getMessage())
            ->error()
            ->withConfirmButton()
            ->confirmButtonText('Fechar')
            ->show();
        }
    }

    public function close_modal () {
        try {
            //code...
        } catch (\Throwable $th) {
          LivewireAlert::title('Erro')
            ->text('erro: ' .$th->getMessage())
            ->error()
            ->withConfirmButton()
            ->confirmButtonText('Fechar')
            ->show();
        }
    }
}
