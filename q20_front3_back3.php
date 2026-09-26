<?php

function front3Back3($str) {
    $len = strlen($str);
    $count = ($len < 3) ? $len : 3;
    $front = substr($str, 0, $count);
    return $front . $str . $front;
}

echo front3Back3("Kitten") . "<br>";
echo front3Back3("Ab");
?>
