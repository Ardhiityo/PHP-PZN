<?php

class Addres
{
    public ?string $country;
}

class User
{
    public ?Addres $addres;
}

// Tanpa nullsafe operator
function getCountry(?User $user): ?string
{
    if ($user != null) {
        if ($user->addres != null) {
            return $user->addres->country;
        }
    }
    return null;
}

getCountry(null);


// Dengan nullsafe operator
function getsCountry(?User $user): ?string
{
    return $user?->addres?->country;
}

echo getsCountry(null);
