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
            'id' => 'integer',
            'transaction_amount' => 'required|numeric',
            'installments' => 'required|integer',
            'token' => 'required|string',
            'payment_method_id' => 'required|string',
            'payer_email' => 'string|email',
            'payer_identification_type' => 'string',
            'payer_identification_number' => 'string'
        ];
    }
}
