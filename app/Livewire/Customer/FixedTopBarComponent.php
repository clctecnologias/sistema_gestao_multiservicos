<?php

namespace App\Livewire\Customer;

use App\Models\PersonalData;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;
use Throwable;

class FixedTopBarComponent extends Component
{
    public $authenticated_username;   
    protected $listeners = ['confirmLogout'];
    
    public function mount () {
        try {
            //code...
            $this->authenticated_username = PersonalData::query()->where('customer_uuid', auth()->user()->customer_uuid)
            ->pluck('fullname')
            ->first();
        } catch (Throwable $th) {
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
        return view('livewire.customer.fixed-top-bar-component');
    }

      public function logout () {
            try {
            
            LivewireAlert::title('Atenção')
            ->text('Deseja realmente, terminar sessão?')
            ->withConfirmButton()
            ->confirmButtonText('Confirmar')
            ->warning()
            ->withDenyButton()
            ->denyButtonText('Cancelar')
            ->withOptions(['allowOutsideClick' => false])
            ->timer('30000')
            ->onConfirm('confirmLogout')
            ->show();

            } catch (Throwable $th) {
            LivewireAlert::title('Erro')
                ->text('erro: ' .$th->getMessage())
                ->error()
                ->withConfirmButton()
                ->confirmButtonText('Fechar')
                ->show();
            }
    }

    public function confirmLogout () {
        try {
           auth()->logout();
           return redirect()->route('login');
        } catch (Throwable $th) {
            LivewireAlert::title('Erro')
                ->text('erro: ' .$th->getMessage())
                ->error()
                ->withConfirmButton()
                ->confirmButtonText('Fechar')
                ->show();
        }
    }
}
