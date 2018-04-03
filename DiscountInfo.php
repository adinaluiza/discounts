<?php

class DiscountInfo
{
    private $reasonForDiscount;
    private $receivedDiscount;

    public function setReasonForDiscount(string $reasonForDiscount): self
    {
        $this->reasonForDiscount = $reasonForDiscount;

        return $this;
    }

    public function getReasonForDiscount(): string
    {
        return $this->reasonForDiscount;
    }

    public function setReceivedDiscount(string $receivedDiscount): self
    {
        $this->receivedDiscount = $receivedDiscount;

        return $this;
    }

    public function getReceivedDiscount(): string
    {
        return $this->receivedDiscount;
    }
}
