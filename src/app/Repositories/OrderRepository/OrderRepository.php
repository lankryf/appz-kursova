<?php

namespace App\Repositories\OrderRepository;

use App\Models\Order;
use App\Models\Role;
use Illuminate\Support\Collection;

class OrderRepository implements OrderRepositoryContract
{
    public function create(array $data): Order
    {
        return Order::create($data);
    }

    public function getByServiceId(int $serviceId): Order
    {
        return Order::where('service_id', $serviceId)->first() ?? Order::null();
    }

    public function getAll(): Collection
    {
        return Order::all();
    }

    public function destroy(Collection $ids): void
    {
        Order::destroy($ids);
    }

    public function update(array $data, Order $order): Order
    {
        $order->update($data);
        return $order;
    }
}
