<?php

namespace App\DTOs;

use App\Http\Requests\RequestPayment;

class IdentificationDTO
{
    public function __construct(
        public string $type = '',
        public string $number = ''
    ) {}

    public static function makeFromRequest(RequestPayment $requestPayment): self
    {
        return new self(
            $requestPayment->type ?? '',
            $requestPayment->number ?? ''
        );
    }
}
