<?php

namespace App\Livewire\Adm;

use App\Models\Payment;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

class CustomerPaymentComponent extends Component
{
    #[Layout('layouts.admin.app')] 
    public $startdate, $enddate;
    public function render()
    {
        return view('livewire.adm.customer-payment-component',[
            'customer_paid_services' =>$this->getPaidServices()
        ]);
    }

      public function getPaidServices () {
            try {
                if ($this->startdate && $this->enddate) {
                     return Payment::query()->with('enterprise_service')
                    ->whereNull('employee_uuid')   
                    ->join('personal_data', 'payments.customer_uuid', 'personal_data.customer_uuid')       
                    ->select(['payments.*', 'payments.created_at As payment_created_at', 'personal_data.*'])
                    ->whereBetween('payments.created_at',[$this->startdate,$this->enddate])
                    ->get();
                }else{
                    return Payment::query()->with('enterprise_service')
                    ->whereNull('employee_uuid')   
                    ->join('personal_data', 'payments.customer_uuid', 'personal_data.customer_uuid')       
                    ->get(['payments.*', 'payments.created_at As payment_created_at', 'personal_data.*']);
                }

            } catch (\Throwable $th) {
            LivewireAlert::title('Erro')
                ->text('erro: ' .$th->getMessage())
                ->error()
                ->withConfirmButton()
                ->timer(0)
                ->confirmButtonText('Fechar')
                ->show();
            }
        }
}
