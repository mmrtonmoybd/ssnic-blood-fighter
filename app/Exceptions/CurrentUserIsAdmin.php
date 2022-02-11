<?php

namespace App\Exceptions;

use RuntimeException;

class CurrentUserIsAdmin extends RuntimeException
{
    public static function forAdmin()
    {
        return new self('Admin can not update or delete own profile.', 401);
    }
}
