<?php
session_start();

if (isset($_SESSION['login'])) {
    header('Location: /session/member.php');
    exit();
}

$error = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['user_name'] == 'eko' && $_POST['password'] == 'eko') {
        $_SESSION['login'] = true;
        $_SESSION['user_name'] = $_POST['user_name'];
        header('Location: /session/member.php');
        exit();
    } else {
        http_response_code(400);
        $error = "Username atau password salah";
    }
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

    <h1>Session</h1>

    <?php if ($error !== "") { ?>
        <h2><?= $error ?></h2>
    <?php } ?>

    <form action="/session/login.php" method="post">
        <label for="user_name">Username
            <input type="text" name="user_name" id="user_name">
        </label>
        <br>
        <label for="password">Password
            <input type="password" name="password" id="password">
        </label>
        <br>
        <button type="submit">Submit</button>
</body>

</html>