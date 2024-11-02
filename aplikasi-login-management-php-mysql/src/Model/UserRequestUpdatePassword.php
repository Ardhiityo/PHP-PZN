<?php

namespace Arya\Mvc\Model;

class UserRequestUpdatePassword
{
    public ?string $id;
    public ?string $oldPassword;
    public ?string $newPassword;
}
