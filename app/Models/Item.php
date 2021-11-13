<?php

namespace App\Models;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;


    protected $fillable = [
        'uid',
        'name',
        'qty',
        'price',
        'total',
    ];


    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
