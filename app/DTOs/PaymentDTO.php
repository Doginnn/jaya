<?php

namespace App\DTOs;

use App\Http\Requests\RequestPayment;

class PaymentDTO
{
    public function __construct(
        public ?string $id = null,
        public string $status = 'PENDING',
        public float $transaction_amount = 0.0,
        public int $installments = 0,
        public string $token = '',
        public string $payment_method_id = ''
    ) {}

    public static function makeFromRequest(RequestPayment $requestPayment): self
    {
        $payer = PayerDTO::makeFromRequest($requestPayment);
        $identification = IdentificationDTO::makeFromRequest($requestPayment);

        return new self(
            $requestPayment->id ?? '',
            $requestPayment->status ?? 'PENDING',
            $requestPayment->transaction_amount ?? 0.0,
            $requestPayment->installments ?? 0,
            $requestPayment->token ?? '',
            $requestPayment->payment_method_id ?? '',
            $payer,
            $identification
        );
    }
}
