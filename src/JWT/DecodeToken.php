<?php


namespace App\JWT;


use Firebase\JWT\JWT;

class DecodeToken
{

    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function decode()
    {
        $publicKey = file_get_contents('rsa/key.pub');
        return JWT::decode($this->token, $publicKey, array('RS256'));
    }
}
