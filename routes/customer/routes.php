<?php

use App\Http\Controllers\Payment\PaymentInvoiceController;
use App\Livewire\Customer\CustomerComponent;
use App\Livewire\Customer\CustomerPaymentCompomnt;
use App\Livewire\Customer\MyProfileComponent;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->prefix('/cliente')->group(function () {
Route::get('/inicio', CustomerComponent::class)->name('dashboard.customer.home');
Route::get('meus/pagamentos',CustomerPaymentCompomnt::class)->name('dashboard.customer.payments');
Route::get('/meu/perfil', MyProfileComponent::class)->name('dashboard.customer.profile');
Route::controller(PaymentInvoiceController::class)->group(function() {
Route::get('/pagamento/factura/', 'generateInvoice')->name('dashboard.customer.payments.invoice');
});

});