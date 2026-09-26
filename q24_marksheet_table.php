<?php

$students = [
    ["name" => "Sita", "eng" => 78, "math" => 88, "sci" => 92],
    ["name" => "Hari", "eng" => 65, "math" => 70, "sci" => 60],
    ["name" => "Gita", "eng" => 90, "math" => 85, "sci" => 95],
];
?>
<!DOCTYPE html>
<html>
<body>
<table border="1" cellpadding="6">
    <tr>
        <th>Name</th><th>English</th><th>Math</th><th>Science</th><th>Total</th>
    </tr>
<?php foreach ($students as $s) {
    $total = $s['eng'] + $s['math'] + $s['sci'];
?>
    <tr>
        <td><?php echo $s['name']; ?></td>
        <td><?php echo $s['eng']; ?></td>
        <td><?php echo $s['math']; ?></td>
        <td><?php echo $s['sci']; ?></td>
        <td><?php echo $total; ?></td>
    </tr>
<?php } ?>
</table>
</body>
</html>
