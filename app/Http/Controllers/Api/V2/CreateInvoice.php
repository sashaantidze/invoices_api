<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateInvoice extends Controller
{

    public function __invoke(Request $request)
    {
        return [
            'data' => [
                'invoice' => $request->invoice,
            ]
        ];
    }
}
