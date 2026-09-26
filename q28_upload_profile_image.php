<?php

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["photo"])) {
    $file = $_FILES["photo"];
    $allowedTypes = ["image/png", "image/jpeg"];
    $maxSize = 500 * 1024;

    if ($file["error"] !== 0) {
        $message = "Upload error.";
    } elseif (!in_array($file["type"], $allowedTypes)) {
        $message = "Only PNG and JPEG images are allowed.";
    } elseif ($file["size"] > $maxSize) {
        $message = "File size must be less than 500 KB.";
    } else {
        move_uploaded_file($file["tmp_name"], "uploads/" . $file["name"]);
        $message = "Profile image uploaded successfully.";
    }
}
?>
<!DOCTYPE html>
<html>
<body>
<form method="post" enctype="multipart/form-data">
    Select Photo (PNG/JPEG): <input type="file" name="photo" required>
    <input type="submit" value="Upload">
</form>
<p><?php echo $message; ?></p>
</body>
</html>
