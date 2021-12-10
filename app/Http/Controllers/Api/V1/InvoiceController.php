<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\InvoiceCollection;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function __invoke()
    {
        $data = Invoice::orderBy('created_at', 'desc')->take(20)->get();

        return new InvoiceCollection($data);
    }
}
