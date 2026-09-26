<?php

function calculatePoints($wins, $draws, $losses) {
    return ($wins * 3) + ($draws * 1) + ($losses * 0);
}

$totalGames = null;
$totalPoints = null;
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $wins = $_POST["wins"];
    $draws = $_POST["draws"];
    $losses = $_POST["losses"];

    if (!is_numeric($wins) || !is_numeric($draws) || !is_numeric($losses) ||
        $wins < 0 || $draws < 0 || $losses < 0) {
        $error = "Please enter valid, non-negative numbers.";
    } else {
        $totalGames = $wins + $draws + $losses;
        $totalPoints = calculatePoints($wins, $draws, $losses);
    }
}
?>
<!DOCTYPE html>
<html>
<body>
<h3>Football Points Calculator</h3>
<form method="post" action="">
    Wins: <input type="number" name="wins" required><br><br>
    Draws: <input type="number" name="draws" required><br><br>
    Losses: <input type="number" name="losses" required><br><br>
    <input type="submit" value="Calculate">
</form>

<?php if ($error) { ?>
    <p style="color:red;"><?php echo $error; ?></p>
<?php } elseif ($totalPoints !== null) { ?>
    <p>Total Games Played: <?php echo $totalGames; ?></p>
    <p>Total Points: <?php echo $totalPoints; ?></p>
<?php } ?>
</body>
</html>
