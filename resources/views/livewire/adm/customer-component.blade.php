<div>
    @section('title', 'Clientes')
        <livewire:adm.fixed-top-bar />
         <x-side-bar />     

            <div id="layoutSidenav_content">
               <main>
                    <x-modals.form-customer :status='$status' />
                    <div class='container-fluid px-4 my-4'>
                         <div class="card mb-4">
                            <div class="card-header ">                             
                                 <h6 class='text-uppercase'>Clientes</h6>
                            </div>
                            <div class="card-body">
                                <div class='d-flex col-md-12 align-items-center gap-2'>

                                    <div class='col-md-6 d-flex align-items-center gap-1'>
                                        <button  data-bs-target='#form-customer' data-bs-toggle='modal' class='btn btn-primary {{ auth()->user()->role->role_type === 'admin' ? 'd-block' : 'd-none' }}'>Adicionar</button>
                                       <input wire:model.live='searcher' class='form-control' type='text' placeholder='Pesquisar cliente' />
                                    </div>                                   

                                    <div class='col-md-md-5 d-flex align-items-center gap-1'>
                                        <input wire:model.live='startdate' class='form-control' type='date' title='Inicio de data' />
                                        <input wire:model.live='enddate' class='form-control' type='date' title='Fim de data'  />                                        
                                    </div>

                                </div>

                                <div class='table-responsive'>
                                    <table class='table table-hover table-striped'>
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th>Data de nascimento</th>                                                                                         
                                                <th>Número de telefone</th>
                                                <th>Endereço</th>
                                                <th>Opções</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if (isset($customers) and $customers->count() > 0)
                                                @foreach ($customers as $customer)
                                                            <tr>  
                                                                <td>{{$customer->fullname ?? ''}}</td>     
                                                                <td>{{$customer->birthday ?? ''}}</td>    
                                                                 <td>{{$customer->phone_number ?? ''}}</td>   
                                                                 <td>{{$customer->address ?? ''}}</td>    
                                                                 <td>
                                                                    <div class='d-flex gap-1 align-items-center'>
                                                                       
                                                                        <button 
                                                                            wire:click="edit('{{ $customer->uuid }}')"
                                                                            data-bs-target='#form-customer' 
                                                                            data-bs-toggle='modal'
                                                                            class='btn btn-primary btn-sm'>
                                                                            <i class='fa fa-edit'></i>
                                                                        </button>

                                                                        <button 
                                                                            wire:click="delete('{{ $customer->uuid }}')"
                                                                            class='btn btn-danger btn-sm'>
                                                                            <i class='fa fa-trash-alt'></i>
                                                                       </button>
                                                                       
                                                                    </div>
                                                                </td>   
                                                            </tr>                                                    
                                                @endforeach
                                            @else
                                            <tr>
                                                <td colspan='10'>
                                                   <div class='alert alert-secondary text-center'>Nenhum resultado encontrado.</div> 
                                                </td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                   
               </main>
               <x-footer />                
            </div>
        </div>
</div>