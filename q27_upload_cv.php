<?php

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["cv"])) {
    $file = $_FILES["cv"];
    $allowedTypes = ["application/pdf", "application/msword",
        "application/vnd.openxmlformats-officedocument.wordprocessingml.document"];
    $maxSize = 1 * 1024 * 1024;

    if ($file["error"] !== 0) {
        $message = "Upload error.";
    } elseif (!in_array($file["type"], $allowedTypes)) {
        $message = "Only PDF and DOC/DOCX files are allowed.";
    } elseif ($file["size"] > $maxSize) {
        $message = "File size must be less than 1 MB.";
    } else {
        move_uploaded_file($file["tmp_name"], "uploads/" . $file["name"]);
        $message = "CV uploaded successfully.";
    }
}
?>
<!DOCTYPE html>
<html>
<body>
<form method="post" enctype="multipart/form-data">
    Select CV (PDF/DOC): <input type="file" name="cv" required>
    <input type="submit" value="Upload">
</form>
<p><?php echo $message; ?></p>
</body>
</html>
