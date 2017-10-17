<?php

if (!function_exists('isMobile')) {
    function isMobile($str)
    {
        if (strlen($str) != 11 || !preg_match('/^1[3|4|5|7|8][0-9]\d{4,8}$/', $str)) {
            return false;
        }
        return true;
    }
}

if (!function_exists('isEmail')) {
    function isEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }
}