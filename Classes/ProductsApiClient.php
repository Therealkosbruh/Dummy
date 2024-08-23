<?php
require_once 'ApiClient.php';

class ProductsApiClient extends ApiClient {
    public function getItems($query) {
        $url = $this->baseUrl . '/products/search?q=' . urlencode($query);
        $response = json_decode(file_get_contents($url), true);
        return $response['products'];
    }

    public function addItem($product) {
        $title = $product['title'];
        $description = $product['description'];
        $price = $product['price'];
        $brand = $product['brand'];
        $category = $product['category'];
        $thumbnail = $product['thumbnail'];

        $query = "INSERT INTO products (title, description, price, brand, category, thumbnail) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssssss", $title, $description, $price, $brand, $category, $thumbnail);
        $stmt->execute();
    }
}