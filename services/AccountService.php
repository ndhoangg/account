<?php 
namespace starter\services;
use starter\security\token\TokenUtil;
use starter\security\password\PasswordUtil;
use starter\repositories\UserDataRepo;
use starter\entities\UserData;

    class AccountService {

        /** Return current user's data
         * @param string    $jwt    An JWT Token
         * Validate the token before
         * @return object   return current active user's data as a PHP object
         */

        public static function getAccountDetail($token) {
            $email = TokenUtil::getSubject($token);
            $repo = new UserDataRepo();
            $user = $repo->findByEmail($email);
            return $user;
        }

        /** Update current user's data
         * @param number    $id     Current user's id
         * @param UserData  $user_data   updated user's data (which has not been saved)
         * Update corresponding user with $id
         */
        
        public static function updateAccountDetail($id, UserData $user_data) {
            $repo = new UserDataRepo();
            $repo->update($id, $user_data);
        }
    }
?>