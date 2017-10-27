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

if (!function_exists('curlPost')) {
    function curlPost($url, $data = '', $header = [],$method='POST')
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if($method=='POST'){
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }

        $result = curl_exec($ch);

        if (curl_errno($ch)) {
            $error=curl_error($ch);
            curl_close($ch);
            print $error;
        } else {
            curl_close($ch);
            return $result;
        }
    }
}