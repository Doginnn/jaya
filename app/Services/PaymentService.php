<?php

namespace App\Services;

use App\DTOs\PaymentDTO;
use App\Http\Requests\RequestPayment;
use App\Models\Identification;
use App\Models\Payer;
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
        // Cria um objeto Payer com os dados do array
        $payer = new Payer();
        $payer->entity_type = $requestData['payer']['entity_type'] ?? 'individual';
        $payer->type = $requestData['payer']['type'] ?? 'customer';
        $payer->email = $requestData['payer']['email'];
        $payer->saveOrFail();

        // Cria um objeto Identification com os dados do array
        $identification = new Identification();
        $identification->type = $requestData['payer']['identification']['type'];
        $identification->number = $requestData['payer']['identification']['number'];
        $identification->payer_id = $payer->id;
        $identification->saveOrFail();

        // Cria o request em objeto Payment
        $requestPayment = new RequestPayment($requestData);

        // Cria um objeto PaymentDTO com os dados do array
        $paymentDTO = PaymentDTO::makeFromRequest($requestPayment);

        // Atribui o ID do pagador e da identificação ao DTO de pagamento
        $paymentDTO->payer_id = $payer->id;
        $paymentDTO->identification_id = $identification->id;

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
