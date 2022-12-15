<?php
namespace starter\handler\parser;

use Exception;
use starter\entities\UserData;
class UpdateInfoFormParser {
    public static function parse() {
        if (isset($_POST['first_name'])) {
            $updatedUser = new UserData();
            $updatedUser->first_name = $_POST['first_name'];
            $updatedUser->lastName = $_POST['last_name'];
            $updatedUser->job_title = $_POST['job_title'];
            $updatedUser->address = $_POST['address'];
            return $updatedUser;
        }
        throw new Exception("Invalid data");
    }
}