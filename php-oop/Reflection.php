<?php

require_once "data/LoginRequest.php";
require_once "helper/ValidationUtill.php";

$request = new LoginRequest();
$request->username = "Eko";
$request->password = "rahasia";

// Tanpa validation reflection
// ValidationUtil::validate($request);

// Dengan validation reflection
ValidationUtil::validateReflection($request);

class RegisterUserRequest
{
    public ?string $name;
    public string $address;
}

$register = new RegisterUserRequest();
$register->name = "Eko";
$register->address = "Subang";

ValidationUtil::validateReflection($register);

echo "Valid" . PHP_EOL;
