<?php

namespace App\Livewire\Customer;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use App\Models\PersonalData;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Component;

class MyProfileComponent extends Component
{
    public $fullname, $email, $phone_number, $address, $birthday,$password, $old_password;
    protected $listeners = ['confirmProfileUpdate' => 'confirmProfileUpdate'];

    public function mount () {
        $customer = PersonalData::query()->where("customer_uuid", auth()->user()->customer_uuid)->first();
        $this->fullname = $customer->fullname;
        $this->email = auth()->user()->email;
        $this->phone_number = $customer->phone_number;
        $this->address = $customer->address;
        $this->birthday = $customer->birthday;
        $this->old_password = auth()->user()->password;
    }
    #[Layout('layouts.customer.app')] 
    public function render()
    {
        return view('livewire.customer.my-profile-component');
    }

    public function updateProfile () {
        try {
           PersonalData::query()->where("customer_uuid", auth()->user()->customer_uuid)->update([
                'fullname' => $this->fullname,
                'phone_number' => $this->phone_number,
                'address' => $this->address,
                'birthday' => $this->birthday
            ]);

            User::query()->where('customer_uuid', auth()->user()->customer_uuid)->update([
                'password' => $this->password ? Hash::make($this->password) : $this->old_password,
            ]);

            if ($this->email !== auth()->user()->email) {
                User::query()->where('customer_uuid', auth()->user()->customer_uuid)->update([
                    'email' => $this->email,
                ]);
            }

            LivewireAlert::title('Sucesso')
                ->text('Perfil atualizado com sucesso!')
                ->success()
                ->withConfirmButton()
                ->confirmButtonText('Fechar')
                ->show();

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
