<?php

function validate_login_request(LoginRequest $request)
{
    if (!isset($request->username)) {
        throw new ValidationException("username is not set");
    } else if (!isset($request->password)) {
        throw new ValidationException("password is not set");
    } else if (trim($request->username) == "") {
        throw new Exception("username is empty");
    } else if (trim($request->password) == "") {
        throw new Exception("password is empty");
    }
}
