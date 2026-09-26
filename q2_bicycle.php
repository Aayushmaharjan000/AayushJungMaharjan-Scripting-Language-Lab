<?php

class Bicycle {
    public $brand;
    public $model;
    public $year;
    public $description = "Used bicycle";
    public $weight;

    public function getInfo() {
        return "$this->brand $this->model ($this->year)";
    }

    public function setWeight($grams) {
        $this->weight = $grams;
    }

    public function getWeight($inKg = false) {
        if ($inKg) {
            return $this->weight / 1000;
        }
        return $this->weight;
    }
}

$bike1 = new Bicycle();
$bike1->brand = "Giant";
$bike1->model = "Escape 3";
$bike1->year = 2022;
$bike1->setWeight(12000);

$bike2 = new Bicycle();
$bike2->brand = "Trek";
$bike2->model = "FX2";
$bike2->year = 2021;
$bike2->setWeight(11500);

echo $bike1->getInfo() . "<br>";
echo $bike2->getInfo() . "<br>";

echo "Bike1 weight (kg): " . $bike1->getWeight(true) . "<br>";
echo "Bike2 weight (kg): " . $bike2->getWeight(true) . "<br>";

echo "Bike1 weight (g): " . $bike1->getWeight() . "<br>";
echo "Bike2 weight (g): " . $bike2->getWeight() . "<br>";
?>
