<?php

$result = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $income = (float) $_POST["income"];
    $gender = $_POST["gender"];

    $remaining = $income;
    $tax = 0;
    $slabDetails = [];

    $slab1 = min($remaining, 1000000);
    $taxSlab1 = $slab1 * 0.01;
    $tax += $taxSlab1;
    $slabDetails["Up to 1,000,000 @ 1%"] = $taxSlab1;
    $remaining -= $slab1;

    $slab2 = min($remaining, 500000);
    $taxSlab2 = $slab2 * 0.10;
    $tax += $taxSlab2;
    $slabDetails["Next 500,000 @ 10%"] = $taxSlab2;
    $remaining -= $slab2;

    $slab3 = min($remaining, 1000000);
    $taxSlab3 = $slab3 * 0.20;
    $tax += $taxSlab3;
    $slabDetails["Next 1,000,000 @ 20%"] = $taxSlab3;
    $remaining -= $slab3;

    $slab4 = min($remaining, 1500000);
    $taxSlab4 = $slab4 * 0.27;
    $tax += $taxSlab4;
    $slabDetails["Next 1,500,000 @ 27%"] = $taxSlab4;
    $remaining -= $slab4;

    if ($remaining > 0) {
        $taxSlab5 = $remaining * 0.29;
        $tax += $taxSlab5;
        $slabDetails["Above 4,000,000 @ 29%"] = $taxSlab5;
    }

    if (strtolower($gender) == "female") {
        $tax = $tax * 0.90;
    }

    $netIncome = $income - $tax;

    $result = [
        "income" => $income,
        "slabDetails" => $slabDetails,
        "tax" => $tax,
        "netIncome" => $netIncome
    ];
}
?>
<!DOCTYPE html>
<html>
<body>
<form method="post">
    Annual Taxable Income (NPR): <input type="number" name="income" step="any" required><br><br>
    Gender:
    <select name="gender">
        <option value="male">Male</option>
        <option value="female">Female</option>
    </select><br><br>
    <input type="submit" value="Calculate Tax">
</form>

<?php if ($result) { ?>
<h3>Tax Report</h3>
<p>1. Annual Taxable Income: <?php echo number_format($result['income'], 2); ?></p>
<p>2. Tax calculated under each slab:</p>
<ul>
<?php foreach ($result['slabDetails'] as $label => $amt) { ?>
    <li><?php echo $label; ?>: <?php echo number_format($amt, 2); ?></li>
<?php } ?>
</ul>
<p>3. Total Tax Payable: <?php echo number_format($result['tax'], 2); ?></p>
<p>4. Net Income After Tax: <?php echo number_format($result['netIncome'], 2); ?></p>
<?php } ?>
</body>
</html>
