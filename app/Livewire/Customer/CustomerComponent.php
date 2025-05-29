<?php

namespace App\Livewire\Customer;

use App\Models\Payment;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

class CustomerComponent extends Component
{
    #[Layout('layouts.customer.app')] 
    public $paymentCounter;
    public function mount() {
        try {
           $this->paymentCounter = $this->customerPaidServiceCounter();
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
    public function render()
    {
        return view('livewire.customer.customer-component');
    }

    public function customerPaidServiceCounter () {
        try {
            return Payment::query()->where('customer_uuid', auth()->user()->customer_uuid)->count();
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
