<?php
namespace starter\util;
class Validator {
    public static function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    public static function validateName($name) {
        return preg_match("/^[a-zA-Z-' ]*$/", $name);
    }
}