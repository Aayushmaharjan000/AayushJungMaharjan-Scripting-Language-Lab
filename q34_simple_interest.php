<?php

$interest = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $principal = $_POST["principal"];
    $rate = $_POST["rate"];
    $time = $_POST["time"];

    $interest = ($principal * $rate * $time) / 100;
}
?>
<!DOCTYPE html>
<html>
<body>
<form method="post">
    Principal: <input type="number" name="principal" step="any" required><br><br>
    Rate (%): <input type="number" name="rate" step="any" required><br><br>
    Time (years): <input type="number" name="time" step="any" required><br><br>
    <input type="submit" value="Calculate">
</form>

<?php if ($interest !== null) { ?>
    <p>Simple Interest: <?php echo $interest; ?></p>
<?php } ?>
</body>
</html>
