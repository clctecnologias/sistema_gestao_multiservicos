<div wire:ignore.self class="modal fade" id="form_enterprise_service" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header border-0">
        <h1 class="modal-title fs-6 text-muted text-uppercase" id="staticBackdropLabel">{{ $status ? 'Editar ' : 'Adicionar' }} serviço</h1>
        <button wire:click='close_modal' type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <main  >
            <div class='col-md-12'>              

                    <div class='form-group w-100'>
                        <label>Serviço:</label>
                        <input required type='text' class='form-control' wire:model='service_name' />
                        @error('service_name')<span class='text-danger'>{{$message}}</span>@enderror
                    </div> 

                     <div class='form-group w-100'>
                        <label>Preço:</label>
                        <input required min='1' type='number' class='form-control' wire:model='service_price' />
                        @error('service_price')<span class='text-danger'>{{$message}}</span>@enderror
                    </div> 
     
            </div>
            <hr>
        

        </main>
      </div>
      <x-buttons.buttons-save-and-cancel :status="$status" />
    </div>
  </div>
</div>