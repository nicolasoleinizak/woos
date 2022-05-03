<?php

header('Access-Control-Allow-Origin: *');
require_once('C:/xampp/htdocs/woos/public/lib/woocommerce-api.php');

/* It creates a new instance of the WC_API_Client class. */
class WcApiClient{
    public static function create(){
        
        $options = array(
            'debug'           => true,
            'return_as_array' => false,
            'validate_url'    => false,
            'timeout'         => 30,
            'ssl_verify'      => false,
        );
        return new WC_API_Client(
            'https://localhost/wp',
            'ck_5ed3c08b50e9cc1f2d00742df7d7d9e45b5902c6',
            'cs_3fa6d64e61cb0a9773e9f900621e2c79e68fc1ca',
            $options
        );
    }
}