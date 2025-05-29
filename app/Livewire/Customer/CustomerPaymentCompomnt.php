<?php

namespace App\Livewire\Customer;
use Livewire\Attributes\Layout;
use Livewire\Component;

class CustomerPaymentCompomnt extends Component
{
    #[Layout('layouts.customer.app')] 
    public function render()
    {
        return view('livewire.customer.customer-payment-compomnt');
    }
}
