<?php
$title = "Home";
$body = "This is the home page";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Cara 1 -->
    <!-- <title><?php echo $title ?></title> -->

    <!-- Cara 2 -->
    <title><?= $title ?></title>
</head>

<body>

    <!-- Cara 1 -->
    <!-- <h1><
?php echo $body ?>
</h1> -->

    <!-- Cara 2 -->
    <h1>
        <?= $body ?>
    </h1>
</body>

</html>