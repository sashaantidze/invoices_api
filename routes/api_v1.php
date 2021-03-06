<?php

use App\Http\Controllers\Api\V1\CreateInvoiceController;
use App\Http\Controllers\Api\V1\DeleteInvoiceController;
use App\Http\Controllers\Api\V1\InvoiceController;
use App\Http\Controllers\Api\V1\SingleInvoiceController;
use App\Http\Controllers\Api\V1\UpdateInvoiceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PaidInvoiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::post('/invoice', CreateInvoiceController::class);
Route::get('/invoices', InvoiceController::class);
Route::get('/invoice/{uid}', SingleInvoiceController::class);
Route::put('/invoice/{uid}', UpdateInvoiceController::class);
Route::delete('/invoice/{uid}', DeleteInvoiceController::class);
Route::post('/paid', PaidInvoiceController::class);

