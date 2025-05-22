<?php

namespace App\Traits;

trait NullObject
{
    protected bool $isNull = true;

    public function isNull(): bool
    {
        return $this->isNull;
    }

    public function isNotNull(): bool
    {
        return !$this->isNull;
    }

    public function setIsNull(bool $isNull): self
    {
        $this->isNull = $isNull;
        return $this;
    }

    public static function null(): self
    {
        return (new static())->setIsNull(true);
    }
}
