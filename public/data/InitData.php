<?php
    use starter\services\AccountService;
    use starter\repositories\UserDataRepo;
    use starter\handler\SessionHandler;
    $token = $_COOKIE["access"];
    SessionHandler::handleSession();
    $user_detail = AccountService::getAccountDetail($token);
    $managers = UserDataRepo::findManagers($user_detail['id']);