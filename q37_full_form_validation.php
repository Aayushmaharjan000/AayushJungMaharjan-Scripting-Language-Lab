<?php

$errors = [];
$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $address = trim($_POST["address"]);
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $website = trim($_POST["website"]);
    $phone = trim($_POST["phone"]);
    $gender = isset($_POST["gender"]) ? $_POST["gender"] : "";
    $course = isset($_POST["course"]) ? $_POST["course"] : "";

    if ($name == "" || !preg_match("/^[a-zA-Z ]+$/", $name)) {
        $errors[] = "Name must not be empty and contain only letters and spaces.";
    }
    if ($address == "") {
        $errors[] = "Address must not be empty.";
    }
    if ($username == "" || !preg_match("/^[a-zA-Z0-9_]+$/", $username)) {
        $errors[] = "Username must not be empty and only contain letters, numbers, underscore.";
    }
    if ($email == "" || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "A valid email is required.";
    }
    if ($password == "" || !preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/", $password)) {
        $errors[] = "Password must be at least 8 characters with upper, lower, digit and special character.";
    }
    if ($website != "" && !filter_var($website, FILTER_VALIDATE_URL)) {
        $errors[] = "Website must be a valid URL.";
    }
    if ($phone == "" || !preg_match("/^(96|97|98)[0-9]{8}$/", $phone)) {
        $errors[] = "Phone must contain only digits and start with 96, 97 or 98.";
    }
    if ($gender == "") {
        $errors[] = "Please select a gender.";
    }
    if ($course == "") {
        $errors[] = "Please select a course.";
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
    Name: <input type="text" name="name"><br><br>
    Address: <input type="text" name="address"><br><br>
    Username: <input type="text" name="username"><br><br>
    Email: <input type="text" name="email"><br><br>
    Password: <input type="password" name="password"><br><br>
    Website: <input type="text" name="website"><br><br>
    Phone: <input type="text" name="phone"><br><br>
    Gender:
    Male <input type="radio" name="gender" value="male">
    Female <input type="radio" name="gender" value="female"><br><br>
    Course:
    <select name="course">
        <option value="">--Select--</option>
        <option value="BCA">BCA</option>
        <option value="BIT">BIT</option>
        <option value="BSc CSIT">BSc CSIT</option>
    </select><br><br>
    <input type="submit" value="Submit">
</form>

<?php foreach ($errors as $e) { echo "<p style='color:red;'>$e</p>"; } ?>
<?php if ($success) { echo "<p style='color:green;'>Form submitted successfully!</p>"; } ?>
</body>
</html>
