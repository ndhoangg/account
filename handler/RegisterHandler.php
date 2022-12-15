<?php

namespace starter\handler;

use starter\handler\parser\RegisterFormParser;
use starter\services\RegisterService;
use Exception;
use starter\core\Request;

class RegisterHandler
{
    /**
     * Construct a DTO of register credentials
     * before forwarding it to the Register service
     */
    public static function registerHandle(Request $request)
    {
        // SessionHandler::handleSession();
        try {
            return RegisterService::register(RegisterFormParser::parse($request->getBody()));
        } catch (Exception $e) {
            return json_encode(["success"=>false, "message"=>$e->getMessage()]);
        }
    }
}
