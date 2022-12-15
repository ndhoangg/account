<?php

namespace starter\security\password;

class PasswordUtil
{
    public static function hashPassword($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
    public static function matchPassword($password, $hashPassword)
    {
        return password_verify($password, $hashPassword);
    }
}
