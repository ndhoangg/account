<?php
namespace starter\services\dto;

class UserLoginDTO
{
        private string $login;
        private string $password;
        public bool $rememberMe;

        /**
         * Get the value of login
         */
        public function getLogin()
        {
                return $this->login;
        }

        /**
         * Set the value of login
         *
         * @return  self
         */
        public function setLogin($login)
        {
                $this->login = $login;

                return $this;
        }

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
}
