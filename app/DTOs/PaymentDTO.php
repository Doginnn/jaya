<?php

namespace App\DTOs;

use App\Http\Requests\RequestPayment;
use App\Models\Payment;

class PaymentDTO
{
    public function __construct(
        public string $id,
        public float $transaction_amount,
        public int $installments,
        public string $token,
        public string $payment_method_id,
        public string $payer_email,
        public string $payer_identification_type,
        public string $payer_identification_number
    ) {}

    public static function makeFromRequest(RequestPayment $requestPayment): self
    {
        return new self(
            $requestPayment->id,
            $requestPayment->transaction_amount,
            $requestPayment->installments,
            $requestPayment->token,
            $requestPayment->payment_method_id,
            $requestPayment->payer_email,
            $requestPayment->payer_identification_type,
            $requestPayment->payer_identification_number
        );
    }
}
