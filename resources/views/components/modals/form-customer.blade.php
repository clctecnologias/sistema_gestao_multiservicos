<div wire:ignore.self class="modal fade" id="form-customer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header border-0">
        <h1 class="modal-title fs-6 text-muted text-uppercase" id="staticBackdropLabel">{{ $status ? 'Editar dados do' : 'Adicionar' }} registo</h1>
        <button wire:click='close_modal' type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form >
            <div class='col-md-12 gap-1 d-flex align-items-start'>
                <div class='col-md-6'>

                    <div class='form-group'>
                        <label>Nome completo:</label>
                        <input type='text' class='form-control' wire:model='fullname' />
                        @error('fullname')<span class='text-danger'>{{$message}}</span>@enderror
                    </div>
                   

                      <div class='form-group'>
                        <label>Número de telefone:</label>
                        <input type='tel' class='form-control' wire:model='phone_number' />
                          @error('phone_number')<span class='text-danger'>{{$message}}</span>@enderror
                    </div>

                </div>

                <div class='col-md-6'>
                   

                    <div class='form-group'>
                        <label>Data de nascimento:</label>
                        <input type='date' class='form-control' wire:model='birthday' />
                          @error('birthday')<span class='text-danger'>{{$message}}</span>@enderror
                    </div>

                     <div class='form-group'>
                        <label>Endereço:</label>
                        <input type='text' class='form-control' wire:model='address' />
                          @error('address')<span class='text-danger'>{{$message}}</span>@enderror
                    </div>

                </div>
            </div>
            <hr>
            <div>
                <h4 class='text-uppercase text-muted'>Dados de acesso:</h4>
                
                <div class='d-flex align-items-start gap-1'>

                     <div class='form-group'>
                        <label>Nome de usuário (opcional)</label>
                        <input wire:model='username' class='form-control' type='text' />                        
                    </div>

                    <div class='form-group'>
                          <label>Email:</label>
                        <input wire:model='email' class='form-control' type='email' />
                          @error('email')<span class='text-danger'>{{$message}}</span>@enderror
                    </div>

                    <div class='form-group'>
                          <label>Senha:</label>
                        <input wire:model='password' class='form-control' type='password' />
                          @error('password')<span class='text-danger'>{{$message}}</span>@enderror
                    </div>

                </div>
            </div>

        </form>
      </div>
      <div class="modal-footer">
        <button 
            type="button"
            class="btn btn-secondary text-uppercase"
            data-bs-dismiss="modal">
           Fechar
        </button>

        <button 
            wire:click="{{ $status ? 'update' : 'save' }}"         
            class="btn text-uppercase {{$status ? 'btn-success' : 'btn-primary'}} ">
            {{$status ? 'Atualizar' : 'Salvar'}} 
        </button>

      </div>
    </div>
  </div>
</div>