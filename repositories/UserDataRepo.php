<?php

namespace starter\repositories;

use starter\entities\UserData;

class UserDataRepo implements RepoInterface
{
    /**
     * implements findAll() method of RepoInterface, 
     * which should returns every data rows of the implemented entity.
     */
    public function findAll()
    {
        $sets = SQLConnection::getConnection()->query("select * from user_data");
        return SQLConnection::fetchAll($sets);
    }
    /**
     * implements findByID() method of RepoInterface,
     * which should returns the row that matched the given primary key of the implemented entity. 
     */
    public function findByID($id)
    {
        $user = SQLConnection::getConnection()->query("select * from user_data where id = '$id'");

        return SQLConnection::fetch($user);
    }
    public function deleteByID($id)
    {
        return null;
    }
    /**
     * Execute insert query to save an user to the database
     * @param UserData  $user_data
     */
    public function save($user_data)
    {
        SQLConnection::getConnection()->exec(
            "insert into user_data 
        (first_name, last_name, 
        email, username,
        password,
        job_title, profile_image, address, birthdate)
        values
        ('$user_data->first_name', '$user_data->lastName',
        '" . $user_data->getEmail() . "', '" . $user_data->getUsername() . "',
        '" . $user_data->getPassword() . "', '$user_data->job_title'
        , '$user_data->profile_image', '$user_data->address'
        , '$user_data->birthdate')"
        );
    }
    /**
     * Execute update query to save an user to the database
     * @param number    $id             user's id
     * @param UserData  $user_data       updated data
     */
    public function update($id, $user_data)
    {
        SQLConnection::getConnection()->exec(
            "update user_data set
            first_name = '$user_data->first_name', last_name = '$user_data->lastName',
            job_title = '$user_data->job_title', address = '$user_data->address'
            where id = $id"
        );
    }
    /**
     * Find an user given his/her email
     * @param string    $email
     */
    public function findByEmail($email)
    {
        $user = SQLConnection::getConnection()->query("select * from user_data where email='$email'");
        return SQLConnection::fetch($user);
    }
    /**
     * Find an user given his/her username
     * @param string    $username
     */
    public function findByUsername($username)
    {
        $user = SQLConnection::getConnection()->query("select * from user_data where username='$username'");
        return SQLConnection::fetch($user);
    }
    /**
     * Find managers of a give staff member
     * @param number    $staffID
     */
    public static function findManagers($staffID)
    {
        $sets = SQLConnection::getConnection()->query("select concat(last_name, ' ', first_name) as name from user_data where id in (
            select manager_id from manage_staff 
            where staff_id = " . $staffID . ");");
        return SQLConnection::fetchAll($sets);
    }
}

