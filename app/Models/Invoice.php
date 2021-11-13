<?php

namespace App\Models;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'uid',
        'street_addreess',
        'city',
        'zip_code',
        'country',
        'client_name',
        'client_email',
        'client_street_addr',
        'client_city',
        'client_zip_code',
        'client_zip_country',
        'invoice_date',
        'invoice_payment_due',
        'invoice_paid',
        'description',
    ];


    protected $casts = [
        'invoice_date' => 'date',
        'invoice_payment_due' => 'date',
    ];


    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
