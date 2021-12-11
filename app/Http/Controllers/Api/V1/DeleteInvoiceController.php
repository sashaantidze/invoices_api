<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DeleteInvoiceController extends Controller
{
    public function __invoke(Request $request)
    {
        if(!$invoice = Invoice::where('uid', $request->uid)->first()){
            return response()->json(['message' => 'Requested resource not found'], Response::HTTP_NOT_FOUND);
        }

        $invoice->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
