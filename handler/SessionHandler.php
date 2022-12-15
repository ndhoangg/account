<?php
namespace starter\handler;
use starter\services\TokenService;

class SessionHandler
{
    public static function handleSession()
    {
        $refreshToken = $_COOKIE['refresh'];
        $accessToken = $_COOKIE['access'];
        if ((strlen($refreshToken) > 0) &&
            (!strlen($accessToken) > 0) &&
            ($_SERVER['REQUEST_URI'] != "/login")
        ) {
            $accessToken = TokenService::renewAccessToken($refreshToken);
            setcookie("access", $accessToken, 0, "/");
            header("Location: " . $_SERVER['REQUEST_URI']);
        } else if (($refreshToken == null) && ($accessToken == null)
            && (($_SERVER['REQUEST_URI'] != "/login")
                && ($_SERVER['REQUEST_URI'] != "/register"))
        ) {
            header("Location: /login");
        }
    }
}
