<?php

namespace DiscountService;

use Rules\{DiscountSwitches, DiscountTarget, DiscountTools};

class Discounts
{
    public static function calculateFor($order): array
    {
        $discounts = [];
        // here if we have a database with all rules we can create a
        // findAllActiveRules query to populate the array|Collection
        $discountRules = [new DiscountSwitches(), new DiscountTools(), new DiscountTarget()];
        foreach ($discountRules as $rule) {
            if ($rule->canBeApplied($order)) {
                $discounts[] = $rule->applyDiscount($order);
            }
        }
        return $discounts;
    }
}
