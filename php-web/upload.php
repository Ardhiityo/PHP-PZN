<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $file_name = $_FILES["upload_file"]['name'];
    $file_type = $_FILES["upload_file"]['type'];
    $file_size = $_FILES["upload_file"]['size'];
    $file_tmp = $_FILES["upload_file"]['tmp_name'];
    $file_error = $_FILES["upload_file"]['error'];

    // Memindahkan file
    move_uploaded_file($file_tmp, __DIR__ . '/file/' . $file_name);
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

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') { ?>
        <table>
            <tr>
                <td>File name : </td>
                <td><?= $file_name ?></td>
            </tr>
            <tr>
                <td>Type : </td>
                <td><?= $file_type ?></td>
            </tr>
            <tr>
                <td>Size : </td>
                <td><?= $file_size ?></td>
            </tr>
            <tr>
                <td>Location : </td>
                <td><?= $file_tmp ?></td>
            </tr>
            <tr>
                <td>Error : </td>
                <td><?= $file_error ?></td>
            </tr>
        </table>
    <?php } ?>

    <h1>Form</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label> Upload File
            <input type="file" name="upload_file">
        </label>
        <button type="submit">Submit</button>
    </form>
</body>

</html>