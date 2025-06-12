<?php

namespace App\Http\Controllers\Payment;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentInvoiceController extends Controller
{
    public function generateInvoice () {
        try {
            $payment = request()->route('payment');
            $pdf = Pdf::loadView('pdf.invoice', ['payment' => $payment]);
            return $pdf->stream('invoice.pdf');
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to generate invoice'], 500);
        }
    }
}
