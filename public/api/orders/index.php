<?php

header("Access-Control-Allow-Origin: *"); 

// Product controller
require_once('../../controllers/Order.php');

echo $_SERVER['REQUEST_METHOD'];
switch($_SERVER['REQUEST_METHOD']){
    case 'GET':
        echo json_encode(Order::create());
}