<?php

namespace DiscountService;


class Product
{
    public static function findProductCategory(string $productId): int
    {
        $products = json_decode(file_get_contents('Resources/products.json'));
        foreach($products as $product){
            if($product->id === $productId){
                return (int) $product->category;
            }
        }
    }
}