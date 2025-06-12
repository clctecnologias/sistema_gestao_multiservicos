<?php

namespace App\Livewire\Customer;

use App\Models\EnterpriseService;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;

class CustomerPaymentCompomnt extends Component
{
    #[Layout('layouts.customer.app')] 
   
    public $counter_number,$months_quantity,$residence_ref,$enterprise_service_uuid,$payment_tb,$payment_method,$showModal,$service_type,$service_price,$service,$available_company_services,$enterprise_service_tb,$status;
    protected $rules = [
    'service_type' => 'required',
    'payment_method' => 'required',
    'service_price' => 'required|numeric|min:0',
    'counter_number' => 'required|numeric|min:0',
    'months_quantity' => 'required|numeric|min:1',
    'residence_ref' => 'required|string|max:255',
    ];

    protected $messages = [
        'service_type.required' => 'Campo obrigatório*',
        'payment_method.required' => 'Campo obrigatório*',
        'service_price.required' => 'Campo obrigatório*',
        'counter_number.required' => 'Campo obrigatório*',
        'months_quantity.required' => 'Campo obrigatório*',
        'residence_ref.required' => 'Campo obrigatório*',
    ];

    protected $listeners = ["confirmPayEnterpriseService", "confirmGeneratePaymentInvoice" => "confirmGeneratePaymentInvoice"];
    
    public function mount (Payment $payment_tb,EnterpriseService $enterprise_service_tb) {
        try {
           $this->enterprise_service_tb = $enterprise_service_tb;
           $this->payment_tb =  $payment_tb;
           $this->available_company_services = $this->getEnterpriseServices();
           $this->showModal = false;
        } catch (\Throwable $th) {
          LivewireAlert::title('Erro')
                ->text('erro: ' .$th->getMessage())
                ->error()
                ->withConfirmButton()
                ->confirmButtonText('Fechar')
                ->show();
        }
    }
    public function render()
    {
        return view('livewire.customer.customer-payment-compomnt', [
            'paid_services' =>$this->getPaidServices()
        ]);
    }

          public function getEnterpriseServices () { 
        try {
             return $this->enterprise_service_tb::query()->latest()->get();
        } catch (\Throwable $th) {
             LivewireAlert::title('Erro')
                ->text('erro: ' .$th->getMessage())
                ->error()
                ->withConfirmButton()
                ->confirmButtonText('Fechar')
                ->show();
        }
     }

     public function setModalVisible () {
        try {
           $this->showModal = true;
        } catch (\Throwable $th) {
            LivewireAlert::title('Erro')
                ->text('erro: ' .$th->getMessage())
                ->error()
                ->withConfirmButton()
                ->confirmButtonText('Fechar')
                ->show();
        }
     }

     public function closePaymentModal () {
        try {
            $this->showModal = false;
            $this->reset(['payment_method','service_type','service_price', 'counter_number','months_quantity','residence_ref']);
            $this->resetValidation();
        } catch (\Throwable $th) {
         LivewireAlert::title('Erro')
                ->text('erro: ' .$th->getMessage())
                ->error()
                ->withConfirmButton()
                ->confirmButtonText('Fechar')
                ->show();
        }
     }

     public function choose_service_topay (EnterpriseService $enterprise_service_tb) {
        try {
            $this->enterprise_service_uuid = $this->service_type;
            $service_price = $enterprise_service_tb->where('uuid',$this->enterprise_service_uuid)->pluck('service_price')->first();          
            $this->service_price =  $service_price;
         
        } catch (\Throwable $th) {
          LivewireAlert::title('Erro')
                ->text('erro: ' .$th->getMessage())
                ->error()
                ->withConfirmButton()
                ->confirmButtonText('Fechar')
                ->show();
        }

     }

        public function pay_service () {
            $this->validate();
            try {
                DB::beginTransaction();
               Payment::query()->create([
                    'payment_method' => $this->payment_method,
                    'enterprise_service_uuid' =>$this->enterprise_service_uuid,
                    'counter_number' => $this->counter_number,
                    'months_quantity' => $this->months_quantity,
                    'residence_ref' => $this->residence_ref,
                    'customer_uuid' => auth()->user()->customer_uuid
                    ]);
               DB::commit();
            $this->closePaymentModal();
            LivewireAlert::title('SUCESSO')
            ->text('Pagamento efectuado com sucesso!')
            ->success()
            ->withConfirmButton()
            ->confirmButtonText('Fechar')
            ->show();  

            } catch (\Throwable $th) {
                DB::rollBack();
              LivewireAlert::title('Erro')
                ->text('erro: ' .$th->getMessage())
                ->error()
                ->withConfirmButton()
                ->timer(0)
                ->confirmButtonText('Fechar')
                ->show();
            }
        }

        public function getPaidServices () {
            try {
               return Payment::query()->where('customer_uuid', auth()->user()->customer_uuid)
               ->with('enterprise_service')
               ->latest()
               ->get();
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

     public function generatePaymentInvoice () {
        try {
           LivewireAlert::title('Atenção')
            ->text('Deseja gerar, a sua factura de pagamento?')
            ->withConfirmButton()
            ->confirmButtonText('Confirmar')
            ->warning()
            ->withDenyButton()
            ->denyButtonText('Cancelar')
            ->withOptions(['allowOutsideClick' => false])
            ->timer('30000')
            ->onConfirm('confirmGeneratePaymentInvoice')
            ->show();

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
