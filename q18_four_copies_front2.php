<?php

function fourCopies($str) {
    if (strlen($str) < 2) {
        return $str;
    }
    $front2 = substr($str, 0, 2);
    return str_repeat($front2, 4);
}

echo fourCopies("Chocolate") . "<br>";
echo fourCopies("Ab");
?>
