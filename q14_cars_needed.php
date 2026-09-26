<?php

function carsNeeded($people) {
    return ceil($people / 5);
}

echo "Cars needed for 12 people: " . carsNeeded(12);
?>
