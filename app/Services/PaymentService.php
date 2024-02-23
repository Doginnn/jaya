<?php

namespace App\Services;

use App\DTOs\PaymentDTO;
use stdClass;

class PaymentService
{
    private $repository;

    public function __construct(
        protected PaymentDTO $paymentDTO
    ) { }

    public function getAll(string $filter = null): array
    {
        return $this->repository->getAll($filter);
    }

    public function findOne(string $id): stdClass|null
    {
        return $this->repository->findOne($id);
    }

    public function create(PaymentDTO $paymentDTO): stdClass
    {
        return $this->repository->create($paymentDTO);
    }

    public function update(PaymentDTO $paymentDTO): stdClass|null
    {
        return $this->repository->update($paymentDTO);
    }

    public function delete(string $id): void
    {
        $this->repository->delete($id);
    }
}
