<?php

namespace starter\handler\parser;

use starter\entities\UserData;
use Exception;

class RegisterFormParser
{
    public static function parse($data)
    {
        if (isset($data)) {
            $user_data = new UserData();
            $name = explode(' ', $data['name']);
            $first_name = array_pop($name);
            $last_name = implode(' ', $name);
            $user_data->first_name = $first_name;
            $user_data->lastName = $last_name;
            $user_data->setEmail($data['email']);
            $user_data->setUsername($data['username']);
            $user_data->setPassword($data['password']);
            return $user_data;
        }
        throw new Exception("Invalid register data");
    }
}
