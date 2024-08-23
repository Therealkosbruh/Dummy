<?php
require_once 'inc/db.php';
require_once 'Classes/ProductsApiClient.php';

$productsApiClient = new ProductsApiClient('https://dummyjson.com', $conn);

$products = $productsApiClient->getItems('phone');

foreach ($products as $product) {
    if (strpos($product['title'], 'iPhone') !== false) {
        $productsApiClient->addItem($product);
    }
}

$conn->close();