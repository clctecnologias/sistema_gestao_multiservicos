<div id="app">
    @section('title','Dashboard cliente | Início')
    
      <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <livewire:customer.fixed-top-bar-component />
            <x-customer.side-bar />    
                  <div class="main-content">
                     @include('components.customer.form-customer-payment')
                    <section class="section">     
                    
                      <div class="row">
                         <div class="col-12">
                              <div class="card">
                                <div class="card-header">
                                  <h4 class="text-uppercase">Meus pagamentos</h4>
                                </div>                                 
                                  
                                <div class="card-body p-0">
                                    <div class='d-flex align-items-center gap-1 my-2 mb-2 mx-2'>
                                        
                                      <button 
                                        wire:click="setModalVisible"
                                        {{-- wire:click='addPaymentService' --}}
                                        class='btn btn-primary'>Adicionar
                                      </button>

                                    </div>

                                  <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>    
                                              <th>Data de cadastro</th>
                                              <th>Serviço</th>
                                              <th>Preço</th> 
                                              <th>Opções</th>                                      
                                            </tr>
                                        </thead>
                                      
                                      @if (isset($paid_services) && $paid_services->count() > 0)
                                            @foreach ($paid_services as $service)
                                                            <tr>
                                                                <td cass="p-0 text-center">{{$service->created_at}}</td>            
                                                                <td cass="p-0 text-center">{{$service->enterprise_service->service_name}}</td>
                                                                <td cass="p-0 text-center">{{$service->enterprise_service->service_price}}</td>   
                                                                <td>
                                                                    <div class='d-flex align-items-center gap-2'>
                                                                        <button wire:click="generatePaymentInvoice({{ $service->id }})" class='btn btn-success'>Gerar factura</button>
                                                                    </div>
                                                                </td>
                                                            </tr>                                           
                                            @endforeach
                                     @else
                                     <tr>
                                        <td colspan="10" class="text-center">Nenhum resultado encontrado!</td>
                                     </tr>
                                      @endif
                                    </table>
                                  </div>
                                </div>
                              </div>
                            </div>   
                      </div>
                      
                      
                    </section>
                  
                    <x-customer.footer />
                  </div>
     </div>
    
      


  </div>

  @push('customer-dashboard-payment-service')
      <script>
            $(document).ready(() => {
                $('#addPaymentButton').click( () => {
                    $('#form_customer_payment').modal.('show');
                    $('#form_customer_payment').appendTo('body').modal('show');
                });

                $("#button-close-modal").click(function () {
                  $('#form_customer_payment').modal.('hide');
                });
            });
      </script>
  @endpush