<?php

namespace App\Models;

use App\Traits\NullObject;
use Carbon\CarbonImmutable;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory, NullObject;

    protected $guarded = [];

    public function getId(): int
    {
        return (int)$this->id;
    }

    public function getStatus(): string
    {
        return (string)$this->status;
    }

    public function getServiceId(): int
    {
        return (int)$this->service_id;
    }

    public function getDescription(): string
    {
        return (string)$this->description;
    }

    public function getName(): string
    {
        return (string)$this->name;
    }

    public function getDeliveryDate(): CarbonInterface
    {
        return CarbonImmutable::parse($this->delivery_date);
    }
}
