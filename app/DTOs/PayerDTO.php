<?php

namespace App\DTOs;

use App\Http\Requests\RequestPayment;

class PayerDTO
{
    public function __construct(
        public string $entity_type = 'individual',
        public string $type = 'customer',
        public string $email = ''
    ) {}

    public static function makeFromRequest(RequestPayment $requestPayment): self
    {
        return new self(
            $requestPayment->payer_entity_type ?? 'individual',
            $requestPayment->payer_type ?? 'customer',
            $requestPayment->payer_email ?? ''
        );
    }
}
