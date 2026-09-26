<?php

class Student {
    public $name;
    public $surname;
    public $country;
    private $tuition;
    protected $indexNumber;

    public function getName() { return $this->name; }
    public function getSurname() { return $this->surname; }

    public function helloWorld() {
        return "Hello World";
    }

    protected function helloFamily() {
        return "Hello Family";
    }

    private function helloMe() {
        return "Hello me!";
    }

    private function getTuition() {
        echo $this->tuition . "<br>";
    }
}

class PartTimeStudent extends Student {
    public function helloParent() {
        return $this->helloFamily();
    }
}

$student = new Student();
$student->name = "Alina";
$student->surname = "Shrestha";
$student->country = "Nepal";

echo $student->getName() . " " . $student->getSurname() . "<br>";
echo $student->helloWorld() . "<br>";

$ptStudent = new PartTimeStudent();
$ptStudent->name = "Bibek";
$ptStudent->surname = "Karki";

echo $ptStudent->getName() . " " . $ptStudent->getSurname() . "<br>";
echo $ptStudent->helloWorld() . "<br>";
echo $ptStudent->helloParent();
?>
