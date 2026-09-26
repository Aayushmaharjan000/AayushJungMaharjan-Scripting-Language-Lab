<?php

function lastCharFrontBack($str) {
    $last = substr($str, -1);
    return $last . $str . $last;
}

echo lastCharFrontBack("Red") . "<br>";
echo lastCharFrontBack("Green") . "<br>";
echo lastCharFrontBack("1");
?>
