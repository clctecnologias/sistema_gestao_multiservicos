
    <div  class="modal fade {{ $showModal ? 'd-block' : 'd-none' }}  show" style="background-color: rgba(0,0,0,0.5);">
              
                <div class="modal-dialog">
                    <div class="modal-content p-4">
                        <h5 class="modal-title text-uppercase">Registar pagamento</h5>

                          <div class="mb-3 mt-3">
                            <label>Método de  pagamento</label>
                            <select class="form-control" wire:model.defer="payment_method" required>
                                <option value="">Selecionar</option>
                                <option value="Cartão de crédito">Cartão de crédito</option>
                                <option value="Pagamento a cash">Pagamento a cash</option>
                            </select>
                            @error('payment_method') <small class="text-danger">{{ $message }}</small> @enderror
                         </div>

                        <div class="mb-3">
                            <label>Selecionar serviço</label>
                            <select wire:change='choose_service_topay' class="form-control" wire:model.defer="service_type" required>
                                <option value="">Selecionar</option>
                                @foreach($available_company_services as $service)
                                    <option value="{{ $service->uuid }}">{{ $service->service_name }}</option>
                                @endforeach
                            </select>
                            @error('service_type') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Preço</label>
                            <input min='0' type="number" class="form-control" wire:model.defer="service_price" required />
                            @error('service_price') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="d-flex justify-content-end ">
                            <button id='button-close-modal' class="btn btn-dark mx-2 text-uppercase" wire:click="closePaymentModal">Cancelar</button>
                            <button class="btn btn-primary text-uppercase" wire:click="pay_service">Confirmar</button>
                        </div>

                    </div>
                </div>
           
</div>
