   <div class="row">
                            <div class="col-12">
                              <div class="card">
                                <div class="card-header">
                                  <h4>Serviços disponíveis | Centro Multiserviços</h4>
                                 
                                  <div class="card-header-form">

                                    <div class="input-group">
                                        <input wire:model.live='enterprise_service_searcher' type="text" class="form-control" placeholder="Pesquisar serviço" />
                                        <div class="input-group-btn">
                                          <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>                                   

                                  </div>
                                </div>
                                <div class="card-body p-0">
                                  <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead >
                                            <tr>                                      
                                              <th>Data de cadastro</th>
                                              <th>Serviço</th>
                                              <th>Preço</th>                                       
                                            </tr>
                                        </thead>
                                      
                                      @if (isset($available_enterprise_services) && $available_enterprise_services->count() > 0)
                                            @foreach ($available_enterprise_services as $service)
                                                            <tr>
                                                                <td cass="p-0 text-center">{{$service->created_at}}</td>            
                                                                <td cass="p-0 text-center">{{$service->service_name}}</td>
                                                                <td cass="p-0 text-center">{{$service->service_price}}</td>   
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