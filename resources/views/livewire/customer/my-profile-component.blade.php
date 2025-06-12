<div id="app">
    @section('title','Dashboard cliente | Meu perfil')
    
      <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <livewire:customer.fixed-top-bar-component />
            <x-customer.side-bar />    
                  <div class="main-content">                    
                    <section class="section">     
                    
                      <div class="row">
                         <div class="col-12">
                              <div class="card">
                                <div class="card-header">
                                  <h4 class="text-uppercase">Meu perfil</h4>
                                </div>                                 
                                  
                                <div class="card-body p-0">

                                    <div class='d-flex align-items-start gap-1 my-2 mb-2 mx-2'>
                                        
                                        <div class='col-md-6'>
                                            <div>
                                                <label for="name">Nome</label>
                                                <input type="text" id="name" class="form-control" placeholder="Nome" wire:model.defer="name">   
                                            </div>

                                            <div>
                                                <label for="phone_number">Número de telefone</label>
                                                <input type="text" id="phone_number" class="form-control" placeholder="Número de telefone" wire:model.defer="phone_number">
                                            </div>

                                            <div>
                                                <label for="address">Endereço</label>
                                                <input type="text" id="address" class="form-control" placeholder="Endereço" wire:model.defer="address">
                                            </div>

                                        </div>

                                        <div class='col-md-6'>
                                            <div>
                                                <label for="birthday">Data de nascimento</label>
                                                <input type="date" id="birthday" class="form-control" placeholder="Data de nascimento" wire:model.defer="birthday">
                                            </div>

                                            <div>
                                                <label for="email">Email</label>
                                                <input type="email" id="email" class="form-control" placeholder="Email" wire:model.defer="email">   
                                            </div>

                                        </div>                                    

                                    </div>

                                    <div class='mx-4 mb-2'>
                                        <button wire:click="updateProfile" class="btn btn-primary">Atualizar</button>
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

  