<?php

namespace App\DTOs;

use App\Http\Requests\RequestPayment;

class IdentificationDTO
{
    public function __construct(
        public string $type = '',
        public string $number = '',
        public int $payer_id = 0
    ) {}

    public static function makeFromRequest(RequestPayment $requestPayment): self
    {
        return new self(
            $requestPayment->type ?? '',
            $requestPayment->number ?? '',
            $requestPayment->payer_id ?? 0
        );
    }
}
