<?php

function last3Upper($str) {
    if (strlen($str) < 3) {
        return strtoupper($str);
    }
    $start = substr($str, 0, -3);
    $end = strtoupper(substr($str, -3));
    return $start . $end;
}

echo last3Upper("Kathmandu") . "<br>";
echo last3Upper("Hi");
?>
