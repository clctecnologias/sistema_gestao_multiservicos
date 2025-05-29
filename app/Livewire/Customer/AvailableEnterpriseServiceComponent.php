<?php

namespace App\Livewire\Customer;

use App\Models\EnterpriseService;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;

class AvailableEnterpriseServiceComponent extends Component
{
    public  $enterprise_service_searcher;

    public function render()
    {
        return view('livewire.customer.available-enterprise-service-component', [
            'available_enterprise_services' =>$this->getAvailableEnterpriseServices(),
        ]);
    }

    public function getAvailableEnterpriseServices() {
        try {
            if (!empty($this->enterprise_service_searcher)) {
                return EnterpriseService::query()->where('service_name', 'like', '%' .$this->enterprise_service_searcher. '%')->get();
            }else{
                return EnterpriseService::query()->get();
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
}
