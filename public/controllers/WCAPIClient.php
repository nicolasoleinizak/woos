<?php

header('Access-Control-Allow-Origin: *');
require_once('C:/xampp/htdocs/woos/public/lib/woocommerce-api.php');

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
            'https://localhost/wordpress',
            'ck_60f571cd6f998e0555d707d2c6fcb9d2ba473892',
            'cs_2df4eec2dd2d35ce179ebe2301d9e12b130eea91',
            $options
        );
    }
}