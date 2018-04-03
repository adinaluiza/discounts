<?php

namespace Rules;

use DiscountInfo;
use DiscountService\Product;

class DiscountSwitches extends DiscountRule
{
    const DISCOUNT_CATEGORY_SWITCHES = 2;
    const DISCOUNT_QTY = 5;

    public function canBeApplied($order): bool
    {
        foreach ($order->items as $line) {
            $category = Product::findProductCategory($line->product_id);
            if ($category === self::DISCOUNT_CATEGORY_SWITCHES && $line->quantity >= self::DISCOUNT_QTY) {
                return true;
            }
        }
        return false;
    }

    public function applyDiscount($order): array
    {
        $discounts = [];

        foreach ($order->items as $line) {
            $category = Product::findProductCategory($line->product_id);
            if ($category === self::DISCOUNT_CATEGORY_SWITCHES && $line->quantity >= self::DISCOUNT_QTY) {
                $discountInfo = new DiscountInfo();
                $discountInfo->setReasonForDiscount("For every product of category 'Switches' (id 2), when you buy five, you get a sixth for free");
                $discountInfo->setReceivedDiscount(floor($line->quantity/self::DISCOUNT_QTY).' pieces');
                $discounts[] = $discountInfo;
            }
        }
        return $discounts;
    }
}


