<?php
session_start();

class Product
{
    private $products = [
        2 => ['name' => 'товар 1', 'price' => 10],
        7 => ['name' => 'товар 2', 'price' => 333],
        43 => ['name' => 'товар 3', 'price' => 332],
    ];

    public function getProducts()
    {
        return $this->products;
    }

    public function existProduct($id)
    {
        return isset($this->products[$id]);
    }

}