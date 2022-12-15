<?php

namespace starter\handler;

use starter\core\Request;
use starter\services\LoginService;
use starter\handler\parser\LoginFormParser;

class LoginHandler
{
    /**
     * Construct a DTO of login credentials
     * before forwarding it to the Login service
     */
    public static function loginHandle(Request $request)
    {
        $data = $request->getBody();
        return LoginService::checkLogin(LoginFormParser::parse($data));
    }
}
