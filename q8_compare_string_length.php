<?php

function isSameLength($str1, $str2) {
    return strlen($str1) == strlen($str2);
}

var_dump(isSameLength("abc", "xyz"));
var_dump(isSameLength("abc", "wxyz"));
?>
