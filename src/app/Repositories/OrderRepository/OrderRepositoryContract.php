<?php

namespace App\Repositories\OrderRepository;

use App\Models\Order;
use Illuminate\Support\Collection;

interface OrderRepositoryContract
{
    public function create(array $data): Order;

    public function getByServiceId(int $serviceId): Order;

    public function getAll(): Collection;

    public function destroy(Collection $ids): void;

    public function update(array $data, Order $order): Order;
}
