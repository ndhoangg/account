<?php

namespace starter\services;

use starter\entities\UserData;
use starter\security\password\PasswordUtil;
use starter\repositories\UserDataRepo;
use starter\util\Alert;
use starter\util\Validator;
use Exception;

include_once dirname(__DIR__) . '/security/password/PasswordUtil.php';
include_once dirname(__DIR__) . '/repositories/UserDataRepo.php';
include_once dirname(__DIR__) . '/util/Alert.php';
class RegisterService
{
    /**
     * Save an user to the database
     * @param UserData  $user_data   Provided object from handler method
     * Hash the given password and replace it with the hashed version
     * Check if there is any user that has the same information as the given DTO (email, username)
     * @throws Exception if there is another user with the same email
     * @throws Exception if there is another user with the same username
     * @throws Exception if the email is invalid
     */
    public static function register(UserData $user_data)
    {
        $password = PasswordUtil::hashPassword($user_data->getPassword());
        $user_data->setPassword($password);
        $email = $user_data->getEmail();
        $username = $user_data->getUsername();
        $repo = new UserDataRepo();
        $userByEmail = $repo->findByEmail($email);
        $userByUsername = $repo->findByUsername($username);
        if (!Validator::validateEmail($email)) {
            throw new Exception("Invalid email");
        }
        if (!Validator::validateName($user_data->first_name) || (!Validator::validateName($user_data->last_name))) {
            throw new Exception("Invalid name");
        }
        if ($userByEmail['email'] == $email) {
            // Alert::show("Already existed email");
            throw new Exception("Already existed email");
        }
        if ($userByUsername['username'] == $username) {
            // Alert::show("Already existed username");
            throw new Exception("Already existed username");
        }

        $repo->save($user_data);
        return json_encode(["success" => true, "code" => 200]);
        // Alert::show("Register successfully, login to use the app");
    }
}
