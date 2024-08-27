<?php

require_once "exception/ValidationException.php";
require_once "helper/Validation.php";
require_once "data/LoginRequest.php";

$login_request = new LoginRequest();
$login_request->username = "Eko";
$login_request->password = "Eko";

$login_request->username = "    ";
$login_request->password = "    ";


// Cara 1
// try {
//     validate_login_request($login_request);
// } catch (ValidationException $exception) {
//     echo "Error : {$exception->getMessage()}";
// } catch (Exception $exception) {
//     echo "Error : {$exception->getMessage()}";
// }

// Cara 2
try {
    validate_login_request($login_request);
} catch (ValidationException | Exception $exception) {
    echo "Error : {$exception->getMessage()}" . PHP_EOL;

    // Debug Exception cara 1
    // var_dump($exception->getTrace());

    // Debug Exception cara 2
    echo $exception->getTraceAsString();
} finally {
    echo "Akan tetap dieksekusi";
}
