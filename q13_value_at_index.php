<?php

function valueAtIndex($array, $index) {
    return $array[$index];
}

$fruits = ["apple", "banana", "mango", "orange"];
echo "Value at index 2: " . valueAtIndex($fruits, 2);
?>
