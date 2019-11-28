<?php

class Encryption {
    CONST SALT = "algo";
    CONST KEY = "tudai2019";

    function encrypt($string) {
        $result = null;
        for($i=0; $i<strlen($string); $i++) {
           $char = substr($string, $i, 1);
           $keychar = substr(Encryption::KEY, ($i % strlen(Encryption::KEY))-1, 1);
           $char = chr(ord($char)+ord($keychar));
           $result.=$char;
        }
        return base64_encode($result);
     }

    
    function decrypt($string) {
        $result = null;
        $string = base64_decode($string);
        for($i=0; $i<strlen($string); $i++) {
            $char = substr($string, $i, 1);
            $keychar = substr(Encryption::KEY, ($i % strlen(Encryption::KEY))-1, 1);
            $char = chr(ord($char)-ord($keychar));
            $result.=$char;
        }
        return $result;
    }
}