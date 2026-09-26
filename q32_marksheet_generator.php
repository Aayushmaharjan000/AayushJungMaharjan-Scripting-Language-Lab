<?php

$result = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $subjects = ["English", "Math", "Science", "Social", "Computer"];
    $marks = [];
    $total = 0;

    foreach ($subjects as $sub) {
        $m = (int) $_POST[$sub];
        $marks[$sub] = $m;
        $total += $m;
    }

    $percentage = $total / count($subjects);
    $status = ($percentage >= 40) ? "Pass" : "Fail";

    $result = [
        "name" => $name,
        "marks" => $marks,
        "total" => $total,
        "percentage" => $percentage,
        "status" => $status
    ];
}
?>
<!DOCTYPE html>
<html>
<body>
<h3>Enter Marks</h3>
<form method="post">
    Name: <input type="text" name="name" required><br><br>
    English: <input type="number" name="English" required><br><br>
    Math: <input type="number" name="Math" required><br><br>
    Science: <input type="number" name="Science" required><br><br>
    Social: <input type="number" name="Social" required><br><br>
    Computer: <input type="number" name="Computer" required><br><br>
    <input type="submit" value="Generate Mark Sheet">
</form>

<?php if ($result) { ?>
<h3>Mark Sheet</h3>
<table border="1" cellpadding="6">
    <tr><th>Name</th><td><?php echo $result['name']; ?></td></tr>
    <?php foreach ($result['marks'] as $sub => $m) { ?>
    <tr><th><?php echo $sub; ?></th><td><?php echo $m; ?></td></tr>
    <?php } ?>
    <tr><th>Total</th><td><?php echo $result['total']; ?></td></tr>
    <tr><th>Percentage</th><td><?php echo round($result['percentage'], 2); ?>%</td></tr>
    <tr><th>Result</th><td><?php echo $result['status']; ?></td></tr>
</table>
<?php } ?>
</body>
</html>
