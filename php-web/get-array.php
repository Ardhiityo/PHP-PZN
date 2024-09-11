<?php
// URL = http://localhost:8080/get-array.php?numbers[]=1&numbers[]=2&numbers[]=3
$numbers = $_GET["numbers"];

$total = 0;

foreach ($numbers as $value) {
    $total += $value;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Total : <?= $total ?></h1>
</body>

</html>