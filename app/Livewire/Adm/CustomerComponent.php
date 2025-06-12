<?php

namespace App\Livewire\Adm;
use Livewire\Attributes\Layout;
use Livewire\Component;

class CustomerComponent extends Component
{
    public $status;
    
    #[Layout('layouts.admin.app')] 
    public function render()
    {
        return view('livewire.adm.customer-component');
    }
}
