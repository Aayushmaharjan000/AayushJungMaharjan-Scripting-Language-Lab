<?php

$intVar    = 25;
$floatVar  = 12.75;
$strVar    = "Hello BCA";
$boolVar   = true;
$arrVar    = array("PHP", "MySQL", "HTML");

echo "Integer: " . $intVar . "<br>";
echo "Float: " . $floatVar . "<br>";
echo "String: " . $strVar . "<br>";
echo "Boolean: " . ($boolVar ? "true" : "false") . "<br>";
print "Array printed using print(): ";
print_r($arrVar);
echo "<br>";

echo "print_r output:<br>";
print_r($arrVar);
echo "<br>var_dump output:<br>";
var_dump($arrVar);

echo "<br>Type checks:<br>";
echo "intVar is integer: "  . (is_int($intVar) ? "Yes" : "No") . "<br>";
echo "floatVar is float: "  . (is_float($floatVar) ? "Yes" : "No") . "<br>";
echo "strVar is string: "   . (is_string($strVar) ? "Yes" : "No") . "<br>";
echo "boolVar is boolean: " . (is_bool($boolVar) ? "Yes" : "No") . "<br>";
echo "arrVar is array: "    . (is_array($arrVar) ? "Yes" : "No") . "<br>";
echo "gettype(intVar): " . gettype($intVar) . "<br>";
?>
