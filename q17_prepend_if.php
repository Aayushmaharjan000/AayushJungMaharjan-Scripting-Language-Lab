<?php

function addIf($str) {
    if (substr($str, 0, 2) == "if") {
        return $str;
    }
    return "if" . $str;
}

echo addIf("Bomb") . "<br>";
echo addIf("ifBomb");
?>
