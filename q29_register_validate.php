<?php

$errors = [];
$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $dob = trim($_POST["dob"]);
    $phone = trim($_POST["phone"]);

    if (strlen($username) < 8) {
        $errors[] = "Username must be at least 8 characters.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email address.";
    }
    if (!DateTime::createFromFormat("Y-m-d", $dob)) {
        $errors[] = "Invalid date of birth.";
    }
    if (!preg_match("/^[0-9]{10}$/", $phone)) {
        $errors[] = "Phone number must be 10 digits.";
    }

    if (empty($errors)) {

        $success = true;
    }
}
?>
<!DOCTYPE html>
<html>
<body>
<form method="post" action="">
    Username: <input type="text" name="username" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Date of Birth: <input type="date" name="dob" required><br><br>
    Phone: <input type="text" name="phone" required><br><br>
    <input type="submit" value="Register">
</form>

<?php foreach ($errors as $e) { echo "<p style='color:red;'>$e</p>"; } ?>
<?php if ($success) { echo "<p style='color:green;'>Registration successful!</p>"; } ?>
</body>
</html>
