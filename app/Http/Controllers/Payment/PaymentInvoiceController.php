<?php

namespace App\Http\Controllers\Payment;
use \Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

class PaymentInvoiceController extends Controller
{
    public function generateInvoice () {
        try {
            $data = [];
            $pdf = Pdf::loadView('pdf.invoice', ["data" =>$data]);
            return $pdf->download('invoice.pdf', ["Attachment" => false]);               
               
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to generate invoice'], 500);
        }
    }
}
