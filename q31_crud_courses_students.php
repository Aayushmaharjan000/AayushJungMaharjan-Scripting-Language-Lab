<?php

include "db_config.php";
$message = "";

if (isset($_POST["add_course"])) {
    $stmt = $conn->prepare("INSERT INTO courses (title, duration, status, created_at, updated_at) VALUES (?,?,?,NOW(),NOW())");
    $stmt->bind_param("sss", $_POST["title"], $_POST["duration"], $_POST["course_status"]);
    $stmt->execute();
    $message = "Course added.";
}

if (isset($_POST["add_student"])) {
    $stmt = $conn->prepare("INSERT INTO students (name, course_id, fee, rollno, phone, address, dob, status, created_at, updated_at) VALUES (?,?,?,?,?,?,?,?,NOW(),NOW())");
    $stmt->bind_param("sidssdss",
        $_POST["s_name"], $_POST["course_id"], $_POST["fee"],
        $_POST["rollno"], $_POST["phone"], $_POST["address"],
        $_POST["dob"], $_POST["s_status"]);
    $stmt->execute();
    $message = "Student added.";
}

if (isset($_GET["del_student"])) {
    $stmt = $conn->prepare("DELETE FROM students WHERE id=?");
    $stmt->bind_param("i", $_GET["del_student"]);
    $stmt->execute();
    $message = "Student deleted.";
}

if (isset($_GET["del_course"])) {
    $stmt = $conn->prepare("DELETE FROM courses WHERE id=?");
    $stmt->bind_param("i", $_GET["del_course"]);
    $stmt->execute();
    $message = "Course deleted.";
}

$courses = $conn->query("SELECT * FROM courses");
$students = $conn->query("SELECT students.*, courses.title AS course_title FROM students LEFT JOIN courses ON students.course_id = courses.id");
?>
<!DOCTYPE html>
<html>
<body>
<p><?php echo $message; ?></p>

<h3>Add Course</h3>
<form method="post">
    Title: <input type="text" name="title" required>
    Duration: <input type="text" name="duration" required>
    Status: <input type="text" name="course_status" required>
    <input type="submit" name="add_course" value="Add Course">
</form>

<h3>Courses</h3>
<table border="1" cellpadding="6">
<tr><th>ID</th><th>Title</th><th>Duration</th><th>Status</th><th>Action</th></tr>
<?php $courses->data_seek(0); while ($c = $courses->fetch_assoc()) { ?>
<tr>
    <td><?php echo $c['id']; ?></td>
    <td><?php echo $c['title']; ?></td>
    <td><?php echo $c['duration']; ?></td>
    <td><?php echo $c['status']; ?></td>
    <td><a href="?del_course=<?php echo $c['id']; ?>">Delete</a></td>
</tr>
<?php } ?>
</table>

<h3>Add Student</h3>
<form method="post">
    Name: <input type="text" name="s_name" required>
    Course ID: <input type="text" name="course_id" required>
    Fee: <input type="text" name="fee" required>
    Roll No: <input type="text" name="rollno" required>
    Phone: <input type="text" name="phone" required>
    Address: <input type="text" name="address" required>
    DOB: <input type="date" name="dob" required>
    Status: <input type="text" name="s_status" required>
    <input type="submit" name="add_student" value="Add Student">
</form>

<h3>Students</h3>
<table border="1" cellpadding="6">
<tr><th>ID</th><th>Name</th><th>Course</th><th>Fee</th><th>Roll No</th><th>Action</th></tr>
<?php while ($s = $students->fetch_assoc()) { ?>
<tr>
    <td><?php echo $s['id']; ?></td>
    <td><?php echo $s['name']; ?></td>
    <td><?php echo $s['course_title']; ?></td>
    <td><?php echo $s['fee']; ?></td>
    <td><?php echo $s['rollno']; ?></td>
    <td><a href="?del_student=<?php echo $s['id']; ?>">Delete</a></td>
</tr>
<?php } ?>
</table>
</body>
</html>
