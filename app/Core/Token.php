<?php

namespace Acme\Core;

class Token
{
    public static function generate()
    {
        return $_SESSION['csrf_token'] = base64_encode(openssl_random_pseudo_bytes(64));
    }

    public static function check($token)
    {
        return isset($_SESSION['csrf_token']) && $_SESSION['csrf_token'] === $token;
    }
}
