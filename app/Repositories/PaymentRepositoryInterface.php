<?php

namespace App\Repositories;

use App\DTOs\PaymentDTO;
use stdClass;

interface PaymentRepositoryInterface
{
    public function getAll(string $filter = null): array;
    public function findOne(string $id): stdClass|null;
    public function create(PaymentDTO $paymentDTO): stdClass;
    public function update(PaymentDTO $paymentDTO): stdClass|null;
    public function delete(string $id): void;
}
