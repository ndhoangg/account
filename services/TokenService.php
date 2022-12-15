<?php
namespace starter\services;
use starter\security\token\TokenUtil;

use Exception;

include_once dirname(__DIR__) . '/security/token/TokenUtil.php';
class TokenService
{
    /**
     * Renew access token for an existing and valid refresh token
     * @param string $refreshToken  The refresh token itself
     * Return an access token
     * 
     */
    public static function renewAccessToken($refreshToken)
    {
        $user_data = [
            'first_name' => TokenUtil::getName($refreshToken),
            'email' => TokenUtil::getSubject($refreshToken)
        ];
        if (TokenUtil::verifyToken($refreshToken)) {
            return TokenUtil::generateAccessToken($user_data);
        }
        throw new Exception("Expired or invalid refresh token");
    }
}
