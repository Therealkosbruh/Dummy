<?php
abstract class ApiClient {
    protected $baseUrl;
    protected $conn;

    public function __construct($baseUrl, $conn) {
        $this->baseUrl = $baseUrl;
        $this->conn = $conn;
    }

    abstract public function getItems($query);
    abstract public function addItem($item);
}