<?php

header("Access-Control-Allow-Origin: *"); 

// Product controller
require_once('../../controllers/Product.php');

switch($_SERVER['REQUEST_METHOD']){
    case 'GET':
        $limit = isset($_GET['limit'])? $_GET['limit'] : 10;
        $page = isset($_GET['page'])? $_GET['page'] : 1;
        echo json_encode(Product::all($limit, $page));
        break;
}