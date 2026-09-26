<?php

class Product {
    private $description;
    private $quantity;
    private $price;

    public function __construct($description, $quantity, $price) {
        if (!is_string($description)) {
            echo "Error: description must be a string.<br>";
        } else {
            $this->description = $description;
        }

        if (!is_numeric($quantity)) {
            echo "Error: quantity must be a number.<br>";
        } else {
            $this->quantity = $quantity;
        }

        if (!is_numeric($price)) {
            echo "Error: price must be a number.<br>";
        } else {
            $this->price = $price;
        }
    }

    public function getDescription() { return $this->description; }
    public function setDescription($d) { $this->description = $d; }

    public function getQuantity() { return $this->quantity; }
    public function setQuantity($q) { $this->quantity = $q; }

    public function getPrice() { return $this->price; }
    public function setPrice($p) { $this->price = $p; }

    public function calculatePrice() {
        return $this->quantity * $this->price;
    }
}

$product = new Product("Notebook", 5, 60);
echo "Description: " . $product->getDescription() . "<br>";
echo "Quantity: " . $product->getQuantity() . "<br>";
echo "Price: " . $product->getPrice() . "<br>";
echo "Total Price: " . $product->calculatePrice();
?>
