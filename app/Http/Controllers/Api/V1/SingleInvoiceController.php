<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\InvoiceResource;
use App\Models\Invoice;
use Illuminate\Http\Request;

class SingleInvoiceController extends Controller
{
    public function __invoke(Request $request)
    {
        $invoice = Invoice::where('uid', $request->uid)->firstOrFail();

        return new InvoiceResource($invoice);
    }
}
