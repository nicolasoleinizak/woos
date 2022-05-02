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
            'ck_5894df43c9ac4c861dd909079f23fd975a427e03',
            'cs_9923ec516890197ef82f3cc91420295d149c6f5e',
            $options
        );
    }
}