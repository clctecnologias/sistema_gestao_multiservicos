<div>
    @section('title', 'Pagamentos')
        <livewire:adm.fixed-top-bar />
         <x-side-bar />     

            <div id="layoutSidenav_content">
               <main>
                   
                    <div class='container-fluid px-4 my-4'>
                         <div class="card mb-4">
                            <div class="card-header d-flex ">                              
                                 <h6 class='text-uppercase'>Pagamentos efectuados</h6>
                            </div>
                            <div class="card-body">
                                <div class='d-flex col-md-12 align-items-center  gap-2'>

                                    <div class=' col-md-12 d-flex align-items-center gap-1'>
                                        <input wire:model.live='startdate' class='form-control ' type='date' title='Inicio de data' />
                                        <input wire:model.live='enddate' class='form-control' type='date' title='Fim de data'  />   
                                    </div>                                  

                                </div>

                                <div class='table-responsive'>
                                    <table class='table table-hover'>
                                        <thead>
                                            <tr>
                                                <th>Data de pagamento</th>
                                                <th>Nome do cliente</th>       
                                                <th>Serviço pago</th>   
                                                <th>Valor pago</th>                                                  
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if (isset($customer_paid_services) and $customer_paid_services->count() > 0)
                                                @foreach ($customer_paid_services as $service)
                                                            <tr>  
                                                                <td>{{$service->payment_created_at ?? ''}}</td>     
                                                                <td>{{$service->fullname ?? ''}}</td>   
                                                                <td>{{$service->enterprise_service->service_name ?? ''}}</td>   
                                                                <td>{{$service->enterprise_service->service_price ?? ''}}</td>   
                                                                 <td class="d-none">
                                                                    <div class='d-flex gap-1 align-items-center justify-content-end'>                                                                  

                                                                        <button  
                                                                            
                                                                            wire:click="edit('{{ $service->uuid }}')"
                                                                            data-bs-target='#form_role' 
                                                                            data-bs-toggle='modal'
                                                                            class='d-none btn btn-primary btn-sm'>
                                                                            <i class='fa fa-print'></i>
                                                                        </button>                                                                    
                                                                        
                                                                      
                                                                            <button 
                                                                               
                                                                                wire:click="delete('{{ $service->uuid }}')"
                                                                                class='d-none btn btn-danger btn-sm'>
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