<?php

namespace App\Http\Controllers\Api;

use App\DTOs\PaymentDTO;
use App\Http\Controllers\Controller;
use App\Services\PaymentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class PaymentController extends Controller
{
    public function __construct(
        protected PaymentService $paymentService
    ) { }

    public function index(Request $request): JsonResponse
    {
//        dd($request);
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
        $validator = Validator::make($request->all(), [
            'transaction_amount' => 'required|numeric',
            'installments' => 'required|integer',
            'token' => 'required|string',
            'payment_method_id' => 'required|string',
            'payer_email' => 'required|email',
            'payer_identification_type' => 'required|string',
            'payer_identification_number' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

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
