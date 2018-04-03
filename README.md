# discounts

Resources - contains the json files, where you can find orders and product

Rules - classes for all existent rules

Service - classes that help calculate the discounts for an order

DiscountIfo.php - builds the object used to display the discounts for each order

index.php - explainDiscounts is the function called with the order in json format
          - it will use the discount service to calculate discounts for a given order
          - you can add as many calls as you need in order to calculate discounts for jsons you add in Resources
