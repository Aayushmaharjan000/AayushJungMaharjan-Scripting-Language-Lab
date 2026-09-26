<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username == "admin" && $password == "admin123") {
        $_SESSION["username"] = $username;
        setcookie("last_user", $username, time() + (86400 * 7));
    }
}

if (isset($_GET["logout"])) {
    session_unset();
    session_destroy();
}
?>
<!DOCTYPE html>
<html>
<body>
<?php if (isset($_SESSION["username"])) { ?>
    <h3>Welcome, <?php echo $_SESSION["username"]; ?>!</h3>
    <a href="?logout=1">Logout</a>
<?php } else { ?>
    <h3>Login Form</h3>
    <form method="post" action="">
        Username: <input type="text" name="username" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
    <?php if (isset($_COOKIE["last_user"])) {
        echo "<p>Last logged in user: " . $_COOKIE["last_user"] . "</p>";
    } ?>
<?php } ?>
</body>
</html>
