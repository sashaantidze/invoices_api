<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class StoreInvoiceReqeust extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'billerStreetAddress' => 'required',
            'billerCity' => 'required',
            'billerZipCode' => 'required',
            'billerCountry' => 'required',
            'clientName' => 'required',
            'clientEmail' => 'required|email',
            'clientStreetAddress' => 'required',
            'clientCity' => 'required',
            'clientZipCode' => 'required',
            'clientCountry' => 'required',
            'invoiceDate' => 'required',
            'paymentDueDate' => 'required',
            'productDescription' => 'required',
            'invoiceItemList' => 'required',
            'invoiceItemList.*.uid' => 'required',
            'invoiceItemList.*.name' => 'required',
            'invoiceItemList.*.qty' => 'required',
            'invoiceItemList.*.price' => 'required',
            'invoiceItemList.*.total' => 'required',
        ];
    }


    protected function failedValidation(Validator $validator)
    {

        $errors = (new ValidationException($validator))->errors();

        throw new HttpResponseException(
            response()->json(['errors' => $errors], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        );
    }


}
