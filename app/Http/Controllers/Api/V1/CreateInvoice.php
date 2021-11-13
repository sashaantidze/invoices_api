<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInvoiceReqeust;
use App\Models\Invoice;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CreateInvoice extends Controller
{

    public function __invoke(StoreInvoiceReqeust $request)
    {
        
        $theInvoice = [
            'uid' => $request->invoiceId,
            'street_addreess' => $request->billerStreetAddress,
            'city' => $request->billerCity,
            'zip_code' => $request->billerZipCode,
            'country' => $request->billerCountry,
            'client_name' => $request->clientName,
            'client_email' => $request->clientEmail,
            'client_street_addr' => $request->clientStreetAddress,
            'client_city' => $request->clientCity,
            'client_zip_code' => $request->clientZipCode,
            'client_zip_country' => $request->clientCountry,
            'invoice_date' => Carbon::createFromTimestampMs($request->invoiceDateUnix),
            'invoice_payment_due' => Carbon::createFromTimestampMs($request->paymentDueDateUnix),
            'invoice_paid' => null,
            'description' => $request->productDescription
        ];

        $invoiceItems = $request->invoiceItemList;

        $itemModels = [];

        foreach($invoiceItems as $item){
            $itemModels[] = new Item([
                'uid' => $item['id'],
                'name' => $item['itemName'],
                'qty' => $item['qty'],
                'price' => $item['price'],
                'total' => $item['total'],
            ]);
        }

        $newInvoice = Invoice::create($theInvoice);

        $newInvoice->items()->saveMany($itemModels);


        return response()->json($newInvoice, 201);

    }
}
