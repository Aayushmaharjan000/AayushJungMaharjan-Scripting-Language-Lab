<?php

function calculateArea($base, $height, $shape) {
    if ($shape == "triangle") {
        return 0.5 * $base * $height;
    } elseif ($shape == "parallelogram") {
        return $base * $height;
    } else {
        return "Unknown shape";
    }
}

echo "Triangle area: " . calculateArea(10, 5, "triangle") . "<br>";
echo "Parallelogram area: " . calculateArea(10, 5, "parallelogram");
?>
