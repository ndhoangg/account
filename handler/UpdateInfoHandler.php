<?php

namespace starter\handler;

use starter\services\AccountService;
use starter\handler\parser\UpdateInfoFormParser;

class UpdateInfoHandler
{
    /**
     * Construct a DTO of updated user data
     * before forwarding it to the Account service
     */
    public static function updateInfoHandle()
    {
        SessionHandler::handleSession();
        AccountService::updateAccountDetail($_POST['user_id'], UpdateInfoFormParser::parse());
    }
}
