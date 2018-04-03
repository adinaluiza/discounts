<?php
namespace Rules;

use DiscountInfo;

class DiscountTarget extends DiscountRule
{
    const TOTAL_FOR_DISCOUNT = 1000;
    const PERCENT_DISCOUNT = 10;

    public function canBeApplied($order): bool
    {
        // here I initially wanted to create a function
        // that checks if the customer has the total of previous orders >1000
        // not just for this order
        return $order->total >= self::TOTAL_FOR_DISCOUNT;
    }

    public function getDiscountValue($order): float
    {
        return round($order->total * self::PERCENT_DISCOUNT / 100, 2);
    }

    public function applyDiscount($order): array
    {
        $discountInfo = new DiscountInfo();
        $discountInfo->setReasonForDiscount("A customer who has already bought for over &euro;1000, gets a discount of 10% on the whole order.");
        $discountInfo->setReceivedDiscount($this->getDiscountValue($order));

        return [$discountInfo];
    }
}

?>
