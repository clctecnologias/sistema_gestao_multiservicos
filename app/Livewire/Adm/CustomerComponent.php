<?php

namespace App\Livewire\Adm;

use App\Models\PersonalData;
use App\Models\User;
use Livewire\Attributes\Layout;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;

class CustomerComponent extends Component
{
    public $customer_uuid,$fullname,$phone_number,$birthday,$address,$username,$email,$password,$status,$searcher,$startdate,$enddate;
    
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

    public function edit ($uuid) {
        try {           
            $this->customer_uuid = $uuid;
            $customer = PersonalData::query()->find($this->customer_uuid);           
            $this->fullname = $customer->fullname;
            $this->phone_number = $customer->phone_number;
            $this->birthday = $customer->birthday;
            $this->address = $customer->address;
            $user = User::query()->where('customer_uuid',$customer->customer_uuid)->first();
            $this->username = $user->username;
            $this->email = $user->email;


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
