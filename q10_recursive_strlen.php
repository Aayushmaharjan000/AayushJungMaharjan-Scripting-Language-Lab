<?php

function recursiveStrlen($str) {
    if ($str === "") {
        return 0;
    }
    return 1 + recursiveStrlen(substr($str, 1));
}

echo "Length of 'Kathmandu' is: " . recursiveStrlen("Kathmandu");
?>
