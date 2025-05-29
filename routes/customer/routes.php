<?php

use App\Livewire\Customer\CustomerComponent;
use App\Livewire\Customer\CustomerPaymentCompomnt;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->prefix('/cliente')->group(function () {
Route::get('/inicio', CustomerComponent::class)->name('dashboard.customer.home');
Route::get('meus/pagamentos',CustomerPaymentCompomnt::class)->name('dashboard.customer.payments');
});