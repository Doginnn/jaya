<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestPayment extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => 'required',
            'transaction_amount' => 'required|numeric',
            'installments' => 'required|integer',
            'token' => 'required|string',
            'payment_method_id' => 'required|string',
            'payer_email' => 'required|email',
            'payer_identification_type' => 'required|string',
            'payer_identification_number' => 'required|string'
        ];
    }
}
