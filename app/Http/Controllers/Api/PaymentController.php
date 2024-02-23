<?php

namespace App\Http\Controllers\Api;

use App\DTOs\PaymentDTO;
use App\Http\Controllers\Controller;
use App\Services\PaymentService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct(
        protected PaymentService $paymentService
    ) { }

    public function index(Request $request)
    {
        $payments = $this->paymentService->getAll($request->filter);

        if (!$payments) {
            return back();
        }

        return $payments;
    }

    public function show(string $id)
    {
        $payments = $this->paymentService->findOne($id);

        if (!$payments) {
            return back();
        }

        return $payments;
    }

    public function edit(string $id)
    {
        $payments = $this->paymentService->findOne($id);

        if (!$payments) {
            return back();
        }

        return $payments;
    }

    public function store(Request $request)
    {
        $this->paymentService->create(
            PaymentDTO::makeFromRequest($request)
        );
    }

    public function update(Request $request, string $id)
    {
        $payments = $this->paymentService->update(
            PaymentDTO::makeFromRequest($request)
        );

        if (!$payments) {
            return back();
        }

        return $payments;
    }
    //PAREI AQUI - Configurar as outras funções conforme store e update

    public function destroy(string $id)
    {
        $this->paymentService->delete($id);

        return redirect()->route('');
    }
}
