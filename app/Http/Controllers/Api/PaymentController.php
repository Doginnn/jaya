<?php

namespace App\Http\Controllers\Api;

use App\DTOs\PaymentDTO;
use App\Http\Controllers\Controller;
use App\Services\PaymentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct(
        protected PaymentService $paymentService
    ) { }

    public function index(Request $request): JsonResponse
    {
        $payment = $this->paymentService->getAll($request->filter);

        return response()->json($payment);
    }

    public function show(string $id): JsonResponse
    {
        $payment = $this->paymentService->findOne($id);

        if (!$payment) {
            return response()->json(['message' => 'Payment not found'], 404);
        }

        return response()->json($payment);
    }

    public function store(Request $request): JsonResponse
    {
        $payment = $this->paymentService->create(
            PaymentDTO::makeFromRequest($request)
        );

        return response()->json($payment, 201);
    }

    public function update(Request $request): JsonResponse
    {
        $payment = $this->paymentService->update(
            PaymentDTO::makeFromRequest($request)
        );

        if (!$payment) {
            return response()->json(['message' => 'Payment not found'], 404);
        }

        return response()->json($payment);
    }

    public function destroy(string $id)
    {
        $this->paymentService->delete($id);

        return response()->json(['message' => 'Payment deleted']);
    }
}
