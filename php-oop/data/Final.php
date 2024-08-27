<?php

// Final CLass

// class SocialMedia
// {
//     public string $name;
// }

// final class Facebook extends SocialMedia {}

// Error, karena final class tidak bisa di extend
// class FakeFacebook extends Facebook {}


// Final Function

class SocialMedia
{
    public string $name;

    final public function login(string $username, string $password): bool
    {
        return true;
    }
}

final class Facebook extends SocialMedia
{

    // Ini akan error karena final function tidak bisa di override
    // public function login(string $username, string $password): bool
    // {
    //     return true;
    // }
}
