<?php

namespace Rules;

abstract class DiscountRule
{
    protected $id;

    protected $title;

    protected $description;

    protected $active = true;

    abstract function applyDiscount($order): array;

    abstract public function canBeApplied($order): bool;

    public function setActive(bool $active = true)
    {
        $this->active = $active;
    }

    public function isActive(): bool
    {
        return $this->active === true;
    }
}
