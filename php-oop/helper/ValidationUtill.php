<?php

require_once __DIR__  . "/../exception/ValidationException.php";

class ValidationUtil
{

    // Tanpa validate reflection
    public static function validate(LoginRequest $request)
    {
        if (!isset($request->username)) {
            throw new ValidationException("Username is null");
        } else if (!isset($request->password)) {
            throw new ValidationException("Password is null");
        }
    }

    // Dengan vallidate reflection
    public static function validateReflection($request)
    {
        $reflection = new ReflectionClass($request);
        $properties = $reflection->getProperties(ReflectionProperty::IS_PUBLIC);

        foreach ($properties as $property) {
            if (!$property->isInitialized($request)) {
                throw new ValidationException("$property->name is not set");
            } else if (is_null($property->getValue($request))) {
                throw new ValidationException("$property->name is null");
            }
        }
    }
}
