<?php

namespace App\Services;

use App\DTOs\PaymentDTO;
use App\Http\Requests\RequestPayment;
use App\Repositories\PaymentRepositoryInterface;
use stdClass;

class PaymentService
{
    protected PaymentDTO $paymentDTO;
    protected PaymentRepositoryInterface $paymentRepository;

    public function __construct(
        PaymentDTO $paymentDTO,
        PaymentRepositoryInterface $paymentRepository
    ) {
        $this->paymentDTO = $paymentDTO;
        $this->paymentRepository = $paymentRepository;
    }

    public function getAll(string $filter = null): array
    {
        return $this->paymentRepository->getAll($filter);
    }

    public function findOne(string $id): stdClass|null
    {
        return $this->paymentRepository->findOne($id);
    }

    public function create(array $requestData): stdClass
    {
        // Cria um objeto RequestPayment com os dados do array
        $requestPayment = new RequestPayment($requestData);

        // Chama makeFromRequest com o objeto RequestPayment
        $paymentDTO = PaymentDTO::makeFromRequest($requestPayment);

        // Definir created_at e updated_at automaticamente
        $paymentDTO->created_at = now()->toDateTimeString();
        $paymentDTO->updated_at = now()->toDateTimeString();

        dd($paymentDTO);
        //PAREI AQUI - Tentar salvar conforme o request que foi passado. Provavelmente será necessário criar um objeto "payer"

        return $this->paymentRepository->create($paymentDTO);
    }

    public function update(array $requestData): stdClass|null
    {
        $paymentDTO = PaymentDTO::makeFromRequest($requestData);

        return $this->paymentRepository->update($paymentDTO);
    }

    public function delete(string $id): void
    {
        $this->paymentRepository->delete($id);
    }
}
