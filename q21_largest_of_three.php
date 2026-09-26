<?php

function largestOfThree($a, $b, $c) {
    $largest = $a;
    if ($b > $largest) $largest = $b;
    if ($c > $largest) $largest = $c;
    return $largest;
}

echo "Largest: " . largestOfThree(10, 25, 17);
?>
