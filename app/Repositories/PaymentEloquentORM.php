<?php

namespace App\Repositories;

use App\DTOs\PaymentDTO;
use App\Models\Payment;
use stdClass;

class PaymentEloquentORM implements PaymentRepositoryInterface
{
    public function __construct(
       protected Payment $paymentModel
    ) {}

    public function getAll(string $filter = null): array
    {
        $paymentsArray = $this->paymentModel
            ->all()
            ->toArray();

        return $paymentsArray;
    }

    public function findOne(string $id): stdClass|null
    {
        $payments = $this->paymentModel->find($id);

        if (!$payments) {
            return null;
        }

        return (object) $payments->toArray();
    }

    public function create(PaymentDTO $paymentDTO): stdClass
    {
        $payments = $this->paymentModel->create(
            (array) $paymentDTO
        );

        return (object) $payments->toArray();
    }

    public function update(PaymentDTO $paymentDTO): stdClass|null
    {
        $payments = $this->paymentModel->find($paymentDTO->id);

        if (!$payments) {
            return null;
        }

        return (object) $payments->toArray();
    }

    public function delete(string $id): void
    {
        $this->paymentModel
            ->findOrFail($id)
            ->delete();
    }
}
