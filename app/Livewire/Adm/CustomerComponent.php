<?php

namespace App\Livewire\Adm;

use App\Models\Customer;
use App\Models\PersonalData;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;

class CustomerComponent extends Component
{
    public $uuid,$credentials_user_data,$fullname,$phone_number,$birthday,$address,$username,$email,$password,$status,$searcher,$startdate,$enddate,$user,$old_password;
    protected $listeners = ['confirmCustomerDeletion'];

    #[Layout('layouts.admin.app')] 
    public function render() {
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
            $this->uuid = $uuid;        
            $this->status = true;    
            $customer = PersonalData::query()->find($this->uuid);           
            $this->user = User::query()->where('customer_uuid',$customer->customer_uuid)->first();
            $this->old_password = $this->user->password;           
            $this->fullname = $customer->fullname;
            $this->phone_number = $customer->phone_number;
            $this->birthday = $customer->birthday;
            $this->address = $customer->address;
            $this->username = $this->user->username;
            $this->email = $this->user->email;

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
          $this->status = false;    
          $this->reset(["uuid", "old_password", "fullname", "phone_number", "birthday", "address", "password", "username","email"]);
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

    public function save () { 
        try {            
            
            DB::beginTransaction();
            $role = Role::query()->where("role_type", "customer")->first();
             $customer = Customer::query()->create([
                "created_at" =>now(), 
                "updated_at" =>now(),
            ]);
             $user = User::query()->create([
                'email' => $this->email,
                'customer_uuid' =>$customer->uuid,
                'role_uuid' =>$role->uuid,
                'password' => Hash::make($this->password),
            ]);

            if ($this->birthday >= now()->year) {
            LivewireAlert::title('ATENÇÃO')
                ->text('A data de nascimento não deve ser igual ou superior a data atual!')
                ->warning()
                ->withConfirmButton()
                ->confirmButtonText('Fechar')
                ->show();

                $this->reset(["uuid", "old_password", "fullname", "phone_number", "birthday", "address", "username","email", "password"]);

            }else{
            PersonalData::query()->create([
                'fullname' =>$this->fullname,
                'birthday' =>$this->birthday,
                'phone_number' =>$this->phone_number,
                'address' =>$this->address,
                'customer_uuid' =>$customer->uuid
            ]);     
            }   
            
            DB::commit();

            LivewireAlert::title('SUCESSO')
            ->text('Dados salvos com sucesso!')
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

    public function update () {
        try {
            DB::beginTransaction();
            PersonalData::query()->where('uuid',$this->uuid)->update([
                 'fullname' =>$this->fullname,
                'birthday' =>$this->birthday,
                'phone_number' =>$this->phone_number,
                'address' =>$this->address,
            ]);

            $this->credentials_user_data = User::query()->where('customer_uuid', $this->user->customer_uuid)->update([
                'password' =>$this->password ? Hash::make($this->password) : $this->old_password,
            ]);

            if ($this->email != $this->user->email) {
                $this->credentials_user_data = User::query()->where('customer_uuid', $this->user->customer_uuid)->update([
                    'email' =>$this->email,
                ]);
            }

            LivewireAlert::title('SUCESSO')
            ->text('Dados atualizados com sucesso!')
            ->success()
            ->withConfirmButton()
            ->confirmButtonText('Fechar')
            ->show(); 

            $this->reset(['password']);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            LivewireAlert::title('Erro')
            ->text('erro: ' .$th->getMessage())
            ->error()
            ->withConfirmButton()
            ->confirmButtonText('Fechar')
            ->show();
        }
    }

    public function delete ($uuid) {
        try {
           $this->uuid = $uuid;
           LivewireAlert::title('ATENÇÃO')
               ->text('Deseja eliminar este registo?')
               ->withConfirmButton()
               ->confirmButtonText('Confirmar')
               ->warning()
               ->withDenyButton()
               ->denyButtonText('Cancelar')
               ->withOptions(['allowOutsideClick' => false])
               ->timer('30000')
               ->onConfirm('confirmCustomerDeletion')
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

    public function confirmCustomerDeletion () {
        try {
            DB::beginTransaction();
            
            $customer = PersonalData::query()->find($this->uuid);
            $user = User::query()->where('customer_uuid', $customer->customer_uuid)->first();
            $default_customer_data = Customer::query()->where('uuid', $customer->customer_uuid)->first();
            $user->delete();
            $customer->delete();
            $default_customer_data->delete();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            LivewireAlert::title('Erro')
                ->text('erro: ' .$th->getMessage())
                ->error()
                ->withConfirmButton()
                ->confirmButtonText('Fechar')
                ->show();
        }
    }
}
