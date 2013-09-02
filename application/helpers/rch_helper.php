<?php

if(!defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('base_path_1')) {
    function base_path_1() {
        return $_SERVER['DOCUMENT_ROOT'] . '';
    }
}

if(!function_exists('ends_with')) {
    function ends_with($str, $ch) {
        return strrpos($str, $ch) == strlen($str) - 1;
    }
}

if(!function_exists('hex2bin')) {
    function hex2bin($hex) {
        $str = '';
        for($i=0; $i<strlen($hex); $i+=2)
            $str .= pack("C", hexdec(substr($hex, $i, 2)));
        
        return $str;
    }
}

?>
