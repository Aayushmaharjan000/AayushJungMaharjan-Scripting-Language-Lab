<?php

class User {
    protected $name;
    protected $surname;
    protected $username;
    protected $is_admin = false;

    public function __construct($name, $surname, $username) {
        $this->name = $name;
        $this->surname = $surname;
        $this->username = $username;
    }

    public function checkAdmin() {
        return $this->is_admin;
    }

    public function printFullName() {
        $fullName = "$this->name $this->surname";
        if ($this->is_admin) {
            $fullName .= " (admin)";
        }
        echo $fullName . "<br>";
    }
}

class Customer extends User {
    private $city;
    private $state;
    private $country;

    public function __construct($name, $surname, $username) {
        parent::__construct($name, $surname, $username);
    }

    public function setLocation($city, $state, $country) {
        $this->city = $city;
        $this->state = $state;
        $this->country = $country;
    }

    public function getCity() { return $this->city; }
    public function getState() { return $this->state; }
    public function getCountry() { return $this->country; }

    public function location() {
        return "$this->city, $this->state, $this->country";
    }
}

class AdminUser extends User {
    public function __construct($name, $surname, $username) {
        parent::__construct($name, $surname, $username);
        $this->is_admin = true;
    }
}

$customer = new Customer("Anish", "Gurung", "anish01");
$customer->setLocation("Pokhara", "Gandaki", "Nepal");

$admin = new AdminUser("Sabina", "Rai", "sabina_admin");

$customer->printFullName();
var_dump($customer->checkAdmin());
echo "Location: " . $customer->location() . "<br><br>";

$admin->printFullName();
var_dump($admin->checkAdmin());
?>
