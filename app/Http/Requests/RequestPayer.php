<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestPayer extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => 'integer',
            'entity_type' => 'required|string',
            'type' => 'required|string',
            'email' => 'required|string'
        ];
    }
}
