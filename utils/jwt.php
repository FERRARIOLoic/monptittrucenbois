<?php
require_once(__DIR__ . '/../config/regex.php');


class JWT
{

    private static function base64url_encode($str): string
    {
        return rtrim(strtr(base64_encode($str), '+/', '-_'), '=');
    }

    public static function generate(array $payload)
    {
        $header = array('alg' => 'HS256', 'type' => 'JWT');
        $header_json = json_encode($header);
        $header_encoded = self::base64url_encode($header_json);

        $payload_json = json_encode($payload);
        $payload_encoded = self::base64url_encode($payload_json);

        $signature = hash_hmac('SHA256', $header_encoded . '.' . $payload_encoded, SECRET_KEY, true);
        $signature_encoded = self::base64url_encode($signature);

        $jwt = $header_encoded . '.' . $payload_encoded . '.' . $signature_encoded;

        // return $jwt;
    }


    public static function is_jwt_valid(string $jwt): object|bool
    {

        $tokenParts = explode('.', $jwt);
        $header = base64_decode($tokenParts[0]);
        $payload = base64_decode($tokenParts[1]);
        $signature_provided = $tokenParts[2];

        if (json_decode($payload)->expire < time()) {
            return false;
        }

        $header_url_encode = self::base64url_encode($header);
        $payload_url_encode = self::base64url_encode($payload);
        $signature = hash_hmac('SHA256', $header_url_encode . '.' . $payload_url_encode, SECRET_KEY, true);
        $signature_url_encoded = self::base64url_encode($signature);

        if ($signature_url_encoded === $signature_provided) {
            return json_decode($payload);
        }
    }
}
