<?php

function findIndex($array, $value) {
    return array_search($value, $array);
}

$fruits = ["apple", "banana", "mango", "orange"];
echo "Index of 'mango': " . findIndex($fruits, "mango");
?>
