<?php

require_once('WCAPIClient.php');

class Order{

    public static function create(){
    
        $body = [
            "payment_method" => "",
            "payment_method_title" => "",
            "set_paid" => true,
            "billing" => [
                "first_name" => "",
                "last_name" => "",
                "address_1" => "",
                "address_2" => "",
                "city" => "",
                "state" => "",
                "postcode" => "",
                "country" => "",
                "email" => "",
                "phone" => ""
            ],
            "shipping" => [
                "first_name" => "",
                "last_name" => "",
                "address_1" => "",
                "address_2" => "",
                "city" => "",
                "state" => "",
                "postcode" => "",
                "country" => ""
            ],
            "line_items" => [
                [
                "product_id" => 301,
                "quantity" => 2
                ],
                [
                "product_id" => 303,
                "quantity" => 1
                ]
            ],
            "shipping_lines" => [
                [
                "method_id" => "",
                "method_title" => "",
                "total" => ""
                ]
            ]
        ];

        return [
            'order' => WCAPIClient::create()->orders->create($body)
        ];
    }


}