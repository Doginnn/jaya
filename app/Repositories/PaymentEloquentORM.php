<?php

namespace App\Repositories;

use App\DTOs\PaymentDTO;
use App\Models\Payment;
use stdClass;

class PaymentEloquentORM implements PaymentRepositoryInterface
{
    protected Payment $paymentModel;

    public function __construct(
        Payment $paymentModel
    ) {
        $this->paymentModel = $paymentModel;
    }

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
        $payment = $this->paymentModel->create((array) $paymentDTO);

        return json_decode(json_encode($payment));
    }

    public function update(PaymentDTO $paymentDTO): stdClass|null
    {
        $payment = $this->paymentModel->find($paymentDTO->id);

        if (!$payment) {
            return null;
        }

        $payment->update((array) $paymentDTO);

        return $payment;
    }

    public function delete(string $id): void
    {
        $this->paymentModel
            ->findOrFail($id)
            ->delete();
    }
}
