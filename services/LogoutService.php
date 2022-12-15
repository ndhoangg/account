<?php
namespace starter\services;
class LogoutService
{
    public static function logout()
    {
        setcookie("refresh", "", time() - 500000);
        setcookie("access", "", time() - 500000);
        header("Location: /login");
        die();
    }
}
