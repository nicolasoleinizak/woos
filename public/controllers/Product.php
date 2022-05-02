<?php

header("Access-Control-Allow-Origin: http://localhost:3000"); 
header("Access-Control-Allow-Methods: PUT, GET, POST"); 
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, access-control-allow-origin");

require_once('WCAPIClient.php');

class Product{
    public static function all($limit = 10, $page = 1){
        return [
            'content' => WcApiClient::create()->products->get(null, [
                'filter[limit]' => $limit,
                'page' => $page
                ]),
            'pagination' => [
                'limit' => $limit,
                'page' => $page++
                ]
            ];
    }
}