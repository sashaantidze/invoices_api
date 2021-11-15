<?php

use App\Http\Controllers\Api\V2\CreateInvoiceController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::post('/invoice', CreateInvoiceController::class);
