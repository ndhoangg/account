<?php

namespace starter\services;

use starter\services\dto\UserLoginDTO;
use starter\security\password\PasswordUtil;
use starter\security\token\TokenUtil;
use starter\repositories\UserDataRepo;
use starter\util\Alert;
use Exception;

class LoginService
{

    /**
     * Validate login credential
     * @param UserLoginDTO  $userLoginDTO   The credentials
     * @return access token if credentials are valid and the user did not require "remember me" function.
     * @return both access and refresh token if credentials are valid and "remember me" is true
     * @throws  Exception   Provided there is no users that matched the given email
     * @throws  Exception   Provided password is wrong
     */

    public static function checkLogin(UserLoginDTO $credential)
    {
        $user_dataRepo = new UserDataRepo();
        $user = $user_dataRepo->findByEmail($credential->getLogin());
        if ($user == null) {
            $user = $user_dataRepo->findByUsername($credential->getLogin());
            if ($user == null) {
                return json_encode(["success"=>false, "message"=>"User not found"]);
            }
        }
        $tokens = [];
        if (PasswordUtil::matchPassword($credential->getPassword(), $user['password'])) {
            if ($credential->rememberMe) {
                $tokens = TokenUtil::rememberMeTokens($user);
            }
            $tokens = TokenUtil::defaultTokens($user);
        }
        setcookie("access", $tokens["access"], 0, "/");
        if ($credential->rememberMe) {
            setcookie("refresh", $tokens["refresh"], time() + 86400 * 30, "/");
        }
        if (count($tokens) < 1) {
            return json_encode(["success"=>false, "message"=>"Wrong password"]);
        }
        return json_encode(["code"=> 200, "success"=> true]);
        // header("Location: /account");
    }
}
