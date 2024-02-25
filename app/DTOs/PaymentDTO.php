<?php

namespace App\DTOs;

use App\Http\Requests\RequestPayment;
use Carbon\Carbon;

class PaymentDTO
{
    public function __construct(
        public ?string $id = null,
        public float $transaction_amount = 0.0,
        public int $installments = 0,
        public string $token = '',
        public string $payment_method_id = '',
        public string $payer_email = '',
        public string $payer_identification_type = '',
        public string $payer_identification_number = '',
        public string $status = 'PENDING'
    ) {}

    public static function makeFromRequest(RequestPayment $requestPayment): self
    {
        return new self(
            $requestPayment->id ?? '',
            $requestPayment->transaction_amount ?? 0.0,
            $requestPayment->installments ?? 0,
            $requestPayment->token ?? '',
            $requestPayment->payment_method_id ?? '',
            $requestPayment->payer_email ?? '',
            $requestPayment->payer_identification_type ?? '',
            $requestPayment->payer_identification_number ?? '',
            $requestPayment->status ?? 'PENDING'
        );
    }
}
