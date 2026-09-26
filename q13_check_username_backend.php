<?php

include "../lab2/db_config.php";

$username = $_GET["username"];

$stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<span style='color:red;'>Username not available.</span>";
} else {
    echo "<span style='color:green;'>Username available.</span>";
}
?>
