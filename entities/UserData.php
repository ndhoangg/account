<?php

namespace starter\entities;

class UserData
{
        public string $first_name = '';
        public string $last_name = '';
        public string $job_title = '';
        private string $email = '';
        private string $username = '';
        private string $password = '';
        public string $profile_image = '';
        public string $birthdate = '1-1-1';
        public string $phone_number = '';
        public string $address = '';

        /**
         * Get the value of password
         */
        public function getPassword()
        {
                return $this->password;
        }

        /**
         * Set the value of password
         *
         * @return  self
         */
        public function setPassword($password)
        {
                $this->password = $password;

                return $this;
        }

        /**
         * Get the value of email
         */
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */
        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        /**
         * Get the value of username
         */
        public function getUsername()
        {
                return $this->username;
        }

        /**
         * Set the value of username
         *
         * @return  self
         */
        public function setUsername($username)
        {
                $this->username = $username;

                return $this;
        }
}
