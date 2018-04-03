<?php

namespace Rules;

use DiscountInfo;
use DiscountService\Product;

class DiscountTools extends DiscountRule
{
    const DISCOUNT_CATEGORY_TOOLS = 1;
    const DISCOUNT_QTY = 1;

    public function canBeApplied($order): bool
    {
        $countTools = 0;

        foreach ($order->items as $line) {
            $category = Product::findProductCategory($line->product_id);
            if ($category === self::DISCOUNT_CATEGORY_TOOLS) {
                $countTools += $line->quantity;
            }
        }
        return $countTools > self::DISCOUNT_QTY;
    }

    public function applyDiscount($order): array
    {
        $lowestPrice = null;
        $discount = 0;

        foreach ($order->items as $line) {
            $category = Product::findProductCategory($line->product_id);
            if ($category === self::DISCOUNT_CATEGORY_TOOLS) {
                $lowestPrice = (isset($lowestPrice) && $lowestPrice < $line->unit_price) ? $lowestPrice : $line->unit_price;
            }
        }
        $discount = round($lowestPrice * 2 / 10, 2);
        $discountInfo = new DiscountInfo();
        $discountInfo->setReasonForDiscount("If you buy two or more products of category 'Tools' (id 1), you get a 20% discount on the cheapest product");
        $discountInfo->setReceivedDiscount($discount);

        return [$discountInfo];
    }
}


