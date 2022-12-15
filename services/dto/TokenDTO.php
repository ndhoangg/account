<?php

namespace starter\services\dto;

class TokenDTO
{
        private string $accessToken;
        private string $refreshToken;

        /**
         * Get the value of refreshToken
         */
        public function getRefreshToken()
        {
                return $this->refreshToken;
        }

        /**
         * Set the value of refreshToken
         *
         * @return  self
         */
        public function setRefreshToken($refreshToken)
        {
                $this->refreshToken = $refreshToken;

                return $this;
        }

        /**
         * Get the value of accessToken
         */
        public function getAccessToken()
        {
                return $this->accessToken;
        }

        /**
         * Set the value of accessToken
         *
         * @return  self
         */
        public function setAccessToken($accessToken)
        {
                $this->accessToken = $accessToken;

                return $this;
        }
}
