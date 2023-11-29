<?php
header("Content-Type: application/json; charset=UTF-8");

include "app/Routes/ProductRoutes.php";

use app\Routes\ProductRoutes;

//tangkap request method
$method = $_SERVER['REQUEST_METHOD'];
//tangkap request path
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

//panggil routes
$productRoute = new ProductRoutes();
$productRoute->handle($method, $path);
