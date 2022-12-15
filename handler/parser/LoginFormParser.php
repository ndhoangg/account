<?php
namespace starter\handler\parser; 
use starter\services\dto\UserLoginDTO;
class LoginFormParser{
    public static function parse($data) {
        $credential = new UserLoginDTO();
        $credential->setLogin($data["email"]);
        $credential->setPassword($data["password"]);
        if (isset($data["remember_me"]) && $data["remember_me"] == "on") {
            $credential->rememberMe = true;
        } else $credential->rememberMe = false;
        return $credential;
    }
}