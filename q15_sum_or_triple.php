<?php

function sumOrTriple($a, $b) {
    $sum = $a + $b;
    if ($a == $b) {
        return $sum * 3;
    }
    return $sum;
}

echo sumOrTriple(3, 5) . "<br>";
echo sumOrTriple(4, 4);
?>
