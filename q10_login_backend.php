<?php

$username = $_POST["username"];
$password = $_POST["password"];

if ($username == "admin" && $password == "admin123") {
    echo "success";
} else {
    echo "fail";
}
?>
