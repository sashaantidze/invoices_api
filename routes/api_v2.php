<?php

use App\Http\Controllers\Api\V2\CreateInvoice;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::post('/invoice', CreateInvoice::class);
