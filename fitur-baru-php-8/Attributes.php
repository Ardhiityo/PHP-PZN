<?php

#[Attribute(Attribute::TARGET_PROPERTY)]
class Length
{
    public int $min;
    public int $max;

    public function __construct(int $min, int $max)
    {
        $this->min = $min;
        $this->max = $max;
    }
}


#[Attribute(Attribute::TARGET_PROPERTY | Attribute::TARGET_PARAMETER)]
class NotBlank {};

class LoginRequest
{
    #[NotBlank]
    #[Length(min: 4, max: 10)]
    public ?string $username;

    #[NotBlank]
    #[Length(min: 8, max: 10)]
    public ?string $password;
}

function validateNotBlank(ReflectionProperty $property, $object)
{
    $attributes = $property->getAttributes(NotBlank::class);
    if (count($attributes) > 0) {
        if (!$property->isInitialized($object)) {
            throw new Exception("Property $property->name is null");
        } else if ($property->getValue($object) == null) {
            throw new Exception("Property $property->name is null");
        }
    }
}

function validateLength(ReflectionProperty $property, $object)
{
    if (!$property->isInitialized($object) || $property->getValue($object) == null) {
        return;
    }
    $length = strlen($property->getValue($object));
    $attributes = $property->getAttributes(Length::class);
    foreach ($attributes as $attribute) {
        $length = $attribute->newInstance();
        $value = $property->getValue($object);
        if (strlen($value) < $length->min) {
            throw new Exception("Property $property->name is too short");
        }
        if (strlen($value) > $length->max) {
            throw new Exception("Property $property->name is too long");
        }
    }
}

function validate(object $object): void
{
    $class = new ReflectionClass($object);
    $properties = $class->getProperties();
    foreach ($properties as $property) {
        validateNotBlank($property, $object);
        validateLength($property, $object);
    }
}


$loginRequest = new LoginRequest();
$loginRequest->username = "Ardi";
$loginRequest->password = "rahasia123";

validate($loginRequest);
