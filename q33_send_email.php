<?php

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = $_POST["email"];
    $subject = "Notification";
    $body = $_POST["message"];
    $headers = "From: no-reply@example.com";

    if (mail($to, $subject, $body, $headers)) {
        $message = "Email sent successfully.";
    } else {
        $message = "Failed to send email.";
    }
}
?>
<!DOCTYPE html>
<html>
<body>
<form method="post">
    Recipient Email: <input type="email" name="email" required><br><br>
    Message: <textarea name="message" required></textarea><br><br>
    <input type="submit" value="Send Email">
</form>
<p><?php echo $message; ?></p>
</body>
</html>
