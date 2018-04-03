<?php
include 'autoload.php';

use DiscountService\Discounts;

function explainDiscounts(string $file)
{
    $order = json_decode(file_get_contents($file));

    $discountRulesApplied = Discounts::calculateFor($order);
    echo '<h2>Order:</h2><p>';
    print_r(json_encode($order));
    echo '</p>';
    echo '<h2>Has discounts:</h2><p>';
    foreach ($discountRulesApplied as $discounts) {
        foreach ($discounts as $discount) {
            print_r("<b>Reason for discount</b> " . $discount->getReasonForDiscount() . "</br>");
            print_r("<b>Received discount</b> " . $discount->getReceivedDiscount() . "</br>");
        }
    }
    echo '</p>';
}

explainDiscounts('Resources/order1.json');
explainDiscounts('Resources/order2.json');
explainDiscounts('Resources/order3.json');

