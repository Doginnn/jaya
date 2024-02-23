<?php

namespace App\Services;

use App\DTOs\PaymentDTO;
use App\Repositories\PaymentRepositoryInterface;
use stdClass;

class PaymentService
{
    private $repository;

    public function __construct(
        protected PaymentDTO $paymentDTO,
        protected PaymentRepositoryInterface $paymentRepository
    ) { }

    public function getAll(string $filter = null): array
    {
        return $this->repository->getAll($filter);
    }

    public function findOne(string $id): stdClass|null
    {
        return $this->repository->findOne($id);
    }

    public function create(array $requestData): stdClass
    {
        $paymentDTO = PaymentDTO::makeFromRequest($requestData);

        return $this->repository->create($paymentDTO);
    }

    public function update(array $requestData): stdClass|null
    {
        $paymentDTO = PaymentDTO::makeFromRequest($requestData);

        return $this->repository->update($paymentDTO);
    }

    public function delete(string $id): void
    {
        $this->repository->delete($id);
    }
}
