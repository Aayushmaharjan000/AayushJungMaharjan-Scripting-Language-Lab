<?php

function absDiff51($n) {
    $diff = abs($n - 51);
    if ($n > 51) {
        return $diff * 3;
    }
    return $diff;
}

echo absDiff51(60) . "<br>";
echo absDiff51(40);
?>
