<?php

header("Access-Control-Allow-Origin: http://localhost:3000"); 
header("Access-Control-Allow-Methods: PUT, GET, POST"); 
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, access-control-allow-origin");

require_once('WCAPIClient.php');

class Product{
    /**
     * It returns an array of products from the WooCommerce API
     * 
     * @param limit The number of products to return.
     * @param page The page number of the results you want to retrieve.
     * 
     * @return An array with two keys: content and pagination.
     */
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