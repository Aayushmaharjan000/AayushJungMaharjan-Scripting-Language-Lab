<?php

include "db_config.php";
$message = "";

if (isset($_POST["add"])) {
    $stmt = $conn->prepare("INSERT INTO records (name, rank_field, status, image, created_by, updated_by, created_at, updated_at) VALUES (?,?,?,?,?,?,NOW(),NOW())");
    $stmt->bind_param("ssssss", $_POST["name"], $_POST["rank_field"], $_POST["status"], $_POST["image"], $_POST["created_by"], $_POST["created_by"]);
    $stmt->execute();
    $message = "Record added.";
}

if (isset($_POST["update"])) {
    $stmt = $conn->prepare("UPDATE records SET name=?, rank_field=?, status=?, updated_by=?, updated_at=NOW() WHERE id=?");
    $stmt->bind_param("ssssi", $_POST["name"], $_POST["rank_field"], $_POST["status"], $_POST["updated_by"], $_POST["id"]);
    $stmt->execute();
    $message = "Record updated.";
}

if (isset($_GET["delete"])) {
    $stmt = $conn->prepare("DELETE FROM records WHERE id=?");
    $stmt->bind_param("i", $_GET["delete"]);
    $stmt->execute();
    $message = "Record deleted.";
}

$result = $conn->query("SELECT * FROM records");
?>
<!DOCTYPE html>
<html>
<body>
<h3>Add / Update Record</h3>
<form method="post">
    Id (for update only): <input type="text" name="id"><br><br>
    Name: <input type="text" name="name" required><br><br>
    Rank: <input type="text" name="rank_field" required><br><br>
    Status: <input type="text" name="status" required><br><br>
    Image filename: <input type="text" name="image"><br><br>
    Created/Updated by: <input type="text" name="created_by" required><br><br>
    <input type="submit" name="add" value="Add">
    <input type="submit" name="update" value="Update">
</form>

<p><?php echo $message; ?></p>

<h3>All Records</h3>
<table border="1" cellpadding="6">
<tr><th>ID</th><th>Name</th><th>Rank</th><th>Status</th><th>Created At</th><th>Action</th></tr>
<?php while ($row = $result->fetch_assoc()) { ?>
<tr>
    <td><?php echo $row["id"]; ?></td>
    <td><?php echo $row["name"]; ?></td>
    <td><?php echo $row["rank_field"]; ?></td>
    <td><?php echo $row["status"]; ?></td>
    <td><?php echo $row["created_at"]; ?></td>
    <td><a href="?delete=<?php echo $row['id']; ?>">Delete</a></td>
</tr>
<?php } ?>
</table>
</body>
</html>
