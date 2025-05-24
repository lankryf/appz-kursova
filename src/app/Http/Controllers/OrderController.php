<?php

namespace App\Http\Controllers;


use App\Models\Role;
use App\Repositories\OrderRepository\OrderRepositoryContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(int $id): JsonResponse
    {
        $order = app(OrderRepositoryContract::class)->getByServiceId($id);
        if ($order->isNull()) {
            return response()->json([
                'message' => 'Order not found'
            ], 404);
        }
        return response()->json([
            'name' => $order->getName(),
            'status' => $order->getStatus(),
            'service_id' => $order->getServiceId(),
            'description' => $order->getDescription(),
            'delivery_date' => $order->getDeliveryDate()->format('Y-m-d'),
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'service_id'     => ['required', 'integer'],
            'name'           => ['required', 'string', 'max:255'],
            'description'    => ['required', 'string', 'max:255'],
            'delivery_date'  => ['required', 'date', 'after:today', 'date_format:Y-m-d'],
        ]);

        $order = app(OrderRepositoryContract::class)->getByServiceId($request->get('service_id'));
        if ($order->isNotNull()) {
            return response()->json([
                'message' => 'Order already exists'
            ], 409);
        }
        $order = app(OrderRepositoryContract::class)->create([
            'user_id' => $request->user()->getId(),
            'name' => $request->get('name'),
            'service_id' => $request->get('service_id'),
            'description' => $request->get('description'),
            'delivery_date' => $request->get('delivery_date'),
        ]);

        return response()->json($order);
    }

    public function destroy(int $id): JsonResponse
    {
        $order = app(OrderRepositoryContract::class)->getByServiceId($id);
        if ($order->isNull()) {
            return response()->json(
                [
                    'message' => 'Order not found'
                ],
                404
            );
        }
        app(OrderRepositoryContract::class)->destroy(collect([$order->getId()]));
        return response()->json([
            'message' => 'Order has been deleted'
        ]);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $validated = $request->validate([
            'name'           => ['string', 'max:255'],
            'description'    => ['string', 'max:255'],
            'status'         => ['string', 'max:255', 'in:pending,canceled,done'],
            'delivery_date'  => ['date', 'after:today', 'date_format:Y-m-d'],
        ]);

        $order = app(OrderRepositoryContract::class)->getByServiceId($id);
        if ($order->isNull()) {
            return response()->json(
                [
                    'message' => 'Order not found'
                ],
                404
            );
        }
        $order = app(OrderRepositoryContract::class)->update(
            $validated,
            $order
        );
        return response()->json(collect($order)->only(['status', 'name', 'description', 'delivery_date']));
    }
}
