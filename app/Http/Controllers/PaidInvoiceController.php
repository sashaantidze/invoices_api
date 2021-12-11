<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaidInvoiceController extends Controller
{
    public function __invoke(Request $request)
    {
        if(!$invoice = Invoice::where('uid', $request->uid)->first()){
            return response()->json(['message' => 'Requested resource not found'], Response::HTTP_NOT_FOUND);
        }

        if($invoice->invoice_paid){
            $invoice->invoice_paid = null;
        }
        else{
            $invoice->invoice_paid = now();
        }
        
        $invoice->save();

        return response()->json(['invoice_paid' => $invoice->invoice_paid]);
    }
}
