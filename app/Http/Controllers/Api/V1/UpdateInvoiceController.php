<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInvoiceReqeust;
use App\Http\Resources\InvoiceResource;
use App\Models\Invoice;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Symfony\Component\HttpFoundation\Response;

class UpdateInvoiceController extends Controller
{
    public function __invoke(StoreInvoiceReqeust $request)
    {

        if(!$invoice = Invoice::where('uid', $request->uid)->first()){
            return response()->json(['message' => 'Requested resource not found'], Response::HTTP_NOT_FOUND);
        }

        $invoice->uid = $request->invoiceId;
        $invoice->street_addreess = $request->billerStreetAddress;
        $invoice->city = $request->billerCity;
        $invoice->zip_code = $request->billerZipCode;
        $invoice->country = $request->billerCountry;
        $invoice->client_name = $request->clientName;
        $invoice->client_email = $request->clientEmail;
        $invoice->client_street_addr = $request->clientStreetAddress;
        $invoice->client_city = $request->clientCity;
        $invoice->client_zip_code = $request->clientZipCode;
        $invoice->client_zip_country = $request->clientCountry;
        $invoice->invoice_date = $request->invoiceDate;
        $invoice->invoice_payment_due = $request->paymentDueDate;
        $invoice->description = $request->productDescription;

        $invoice->save();

        $invoice->items()->delete();

        $invoiceItems = $request->invoiceItemList;

        $itemModels = [];

        foreach($invoiceItems as $item){
            $itemModels[] = new Item([
                'uid' => $item['uid'],
                'name' => $item['name'],
                'qty' => $item['qty'],
                'price' => $item['price'],
                'total' => $item['total'],
            ]);
        }

        $invoice->items()->saveMany($itemModels);

        return response()->json(new InvoiceResource($invoice));
    }
}
