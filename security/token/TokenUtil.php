<?php 
    namespace starter\security\token;
    include_once dirname(__DIR__)."/entities/UserData.php";
    class TokenUtil {
        private static float $access_time = 3600;
        private static float $refresh_time = 36000;
        private static float $remember_me_refresh_time = 360000;
        private static string $key = 'veryhardtobreak';

        /**
         * Generate a token
         * @param   UserData    $user_data
         * @param   string      $tokenType      
         * @param   int         $expired_time (UNIX timestamp)
         * @return  string      Constructed token
         */
        public static function generateToken($user_data, $tokenType, $expired_time) {
            $headers = ['alg'=>'HS256', 'typ'=>'JWT'];
            $headers_encoded = base64_encode(json_encode($headers));
            $payload = [
                'sub'=>$user_data['email'], 
                'name'=>$user_data['first_name'], 
                'iat'=>time(), 
                'exp'=>(time() + $expired_time), 
                'typ'=>$tokenType
            ];
            $payload_encoded = base64_encode(json_encode($payload));
            $payload_encoded = str_replace(['+', '/', '='], ['-', '_', ''], $payload_encoded);
            $headers_encoded = str_replace(['+', '/', '='], ['-', '_', ''], $headers_encoded);
            $signature = base64_encode(hash_hmac('SHA256', "$headers_encoded.$payload_encoded" , self::$key, true));
            return str_replace(['+', '/', '='], ['-', '_', ''], "$headers_encoded.$payload_encoded.$signature");
        }

        /**
         * Verify a token
         * @param   string  $token
         * Decode the token's payload
         * Resign the payload and verify whether it matches the provided hash signature
         * If they are matched, return true else return false
         */
        public static function verifyToken($token) {
            $splits = explode('.', $token);
            $signature_given = $splits[2];
            $base64_part = str_replace(['+', '/', '='], ['-', '_', ''], $splits[0].'.'.$splits[1]);
            $own_signature = base64_encode(hash_hmac('SHA256', "$base64_part" , self::$key, true));
            $own_signature = str_replace(['+', '/', '='], ['-', '_', ''], $own_signature);
            $expired_time = self::getExpiredTime($token);
            if ($expired_time < time()) {
                return false;
            }
            if ($own_signature === $signature_given) {
                return true;
            }
            return false;
        }

        /**
         * Generate access token
         * @param UserData  $user_data
         */
        public static function generateAccessToken($user_data) {
            return self::generateToken($user_data, 'Access', self::$access_time);
        }

        /**
         * Generate refresh token
         * @param UserData  $user_data
         */
        public static function generateRefreshToken($user_data) {
            return self::generateToken($user_data, 'Refresh', self::$refresh_time);
        }

        /**
         * Generate a long (remember me) refresh token
         */
        public static function generateRememberMeRefreshToken($user_data) {
            return self::generateToken($user_data, 'Refresh', self::$remember_me_refresh_time);
        }

        /**
         * Construct and return an object that contains both access and refresh token
         * for remember me case
         */
        public static function rememberMeTokens($user_data) {
            return array("access"=>self::generateAccessToken($user_data), "refresh"=>self::generateRememberMeRefreshToken($user_data));
        }

        /**
         * Construct and return an object that contains both access and refresh token
         * for default case
         */
        public static function defaultTokens($user_data) {
            return array("access"=>self::generateAccessToken($user_data), "refresh"=>self::generateRefreshToken($user_data));
        }

        /**
         * Return payload PHP object
         */
        public static function getPayload($token) {
            $splits = explode('.', $token);
            $payload = $splits[1];
            $payload = json_decode(base64_decode($payload));
            return $payload;
        }

        /**
         * Return expired time of the token
         */
        public static function getExpiredTime($token) {
            return self::getPayload($token)->{'exp'};
        }

        /**
         * Return subject of the token
         */
        public static function getSubject($token) {
            return self::getPayload($token)->{'sub'};
        }

        public static function getName($token) {
            return self::getPayload($token)->{'name'};
        }

 
    }


