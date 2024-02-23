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
            'id',
            'transaction_amount',
            'installments',
            'token',
            'payment_method_id',
            'payer_email',
            'payer_identification_type',
            'payer_identification_number'
        ];
    }
}
