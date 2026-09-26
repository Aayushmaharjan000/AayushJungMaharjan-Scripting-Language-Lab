<?php

$info = [
    'name'    => 'Ram Bahadur',
    'address' => 'Lalitpur',
    'email'   => 'info@ram.com',
    'phone'   => 98454545,
    'website' => 'www.ram.com'
];
?>
<!DOCTYPE html>
<html>
<body>
<table border="1" cellpadding="6">
<?php foreach ($info as $key => $value) { ?>
    <tr>
        <td><?php echo ucfirst($key); ?></td>
        <td><?php echo $value; ?></td>
    </tr>
<?php } ?>
</table>
</body>
</html>
