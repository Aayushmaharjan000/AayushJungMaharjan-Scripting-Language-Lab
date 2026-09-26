<?php

$output = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $filename = $_POST["filename"];
    $action = $_POST["action"];

    switch ($action) {
        case "check":
            $output = file_exists($filename) ? "File exists." : "File does not exist.";
            break;

        case "open":
            $handle = fopen($filename, "a+");
            $output = $handle ? "File opened successfully." : "Could not open file.";
            if ($handle) fclose($handle);
            break;

        case "write":
            $handle = fopen($filename, "a");
            fwrite($handle, $_POST["text"] . "\n");
            fclose($handle);
            $output = "Text written to file.";
            break;

        case "read":
            $output = file_exists($filename) ? nl2br(htmlspecialchars(file_get_contents($filename))) : "File not found.";
            break;

        case "rename":
            $newName = $_POST["newname"];
            $output = rename($filename, $newName) ? "File renamed to $newName." : "Rename failed.";
            break;

        case "permissions":
            $output = file_exists($filename) ? "Permissions: " . substr(sprintf('%o', fileperms($filename)), -4) : "File not found.";
            break;

        case "chmod":
            $output = chmod($filename, 0644) ? "Permissions changed to 0644." : "chmod failed.";
            break;
    }
}
?>
<!DOCTYPE html>
<html>
<body>
<form method="post">
    Filename: <input type="text" name="filename" value="sample.txt" required><br><br>
    New Filename (for rename): <input type="text" name="newname"><br><br>
    Text to write: <input type="text" name="text"><br><br>
    Action:
    <select name="action">
        <option value="check">Check File</option>
        <option value="open">Open File</option>
        <option value="write">Write File</option>
        <option value="read">Read File</option>
        <option value="rename">Rename File</option>
        <option value="permissions">Check Permissions</option>
        <option value="chmod">Change Permissions</option>
    </select><br><br>
    <input type="submit" value="Run">
</form>
<p><?php echo $output; ?></p>
</body>
</html>
