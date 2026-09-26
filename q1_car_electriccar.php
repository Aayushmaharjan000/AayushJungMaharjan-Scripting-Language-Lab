<?php

interface Vehicle {
    public function startEngine();
    public function stopEngine();
}

class Car implements Vehicle {
    private $make;
    private $model;
    private $year;

    public function __construct($make, $model, $year) {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
    }

    public function getMake() { return $this->make; }
    public function getModel() { return $this->model; }
    public function getYear() { return $this->year; }

    public function setMake($make) { $this->make = $make; }
    public function setModel($model) { $this->model = $model; }
    public function setYear($year) { $this->year = $year; }

    public function start() {
        echo "Car started.<br>";
    }

    public function displayInfo() {
        echo "Make: $this->make, Model: $this->model, Year: $this->year<br>";
    }

    public function getDescription() {
        return "This is a $this->year $this->make $this->model.";
    }

    public function startEngine() {
        echo "Car engine started.<br>";
    }

    public function stopEngine() {
        echo "Car engine stopped.<br>";
    }
}

class ElectricCar extends Car {
    private $batteryCapacity;

    public function __construct($make, $model, $year, $batteryCapacity) {
        parent::__construct($make, $model, $year);
        $this->batteryCapacity = $batteryCapacity;
    }

    public function charge() {
        echo "Charging the electric car. Battery capacity: {$this->batteryCapacity} kWh<br>";
    }

    public function getDescription() {
        return parent::getDescription() . " It is fully electric with {$this->batteryCapacity} kWh battery.";
    }
}

$car = new Car("Toyota", "Corolla", 2020);
$car->start();
$car->displayInfo();
echo $car->getDescription() . "<br><br>";

$eCar = new ElectricCar("Tesla", "Model 3", 2023, 75);
$eCar->start();
$eCar->displayInfo();
$eCar->charge();
echo $eCar->getDescription();
?>
