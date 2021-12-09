<?php

namespace App\Http\Resources;

use App\Http\Resources\ItemResource;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [

            'id' => $this->id,
            'uid' => $this->uid,
            'invoice_date' => $this->invoice_date,
            'invoice_payment_due' => $this->invoice_payment_due,
            'invoice_paid' => $this->invoice_paid,
            'invoice_draft' => $this->drafted,
            'description' => $this->description,
            'itemsTotal' => $this->items()->sum('total'),
            'items' => new ItemCollection($this->items),

            'biller_data' => [
                'street_address' => $this->street_addreess,
                'city' => $this->city,
                'zip_code' => $this->zip_code,
                'country' => $this->country,
            ],
            
            'client_data' => [
                'name' => $this->client_name,
                'email' => $this->client_email,
                'street_address' => $this->client_street_addr,
                'city' => $this->client_city,
                'zip_code' => $this->client_zip_code,
                'country' => $this->client_zip_country,
            ],

            
        ];
    }
}
