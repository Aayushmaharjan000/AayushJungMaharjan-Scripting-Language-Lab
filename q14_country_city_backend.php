<?php

$cities = [
    "Nepal" => ["Kathmandu", "Pokhara", "Biratnagar", "Butwal"],
    "India" => ["Delhi", "Mumbai", "Bangalore"],
    "USA"   => ["New York", "Los Angeles", "Chicago"]
];

$country = $_GET["country"];
$options = "<option value=''>--Select City--</option>";

if (isset($cities[$country])) {
    foreach ($cities[$country] as $city) {
        $options .= "<option value='$city'>$city</option>";
    }
}

echo $options;
?>
