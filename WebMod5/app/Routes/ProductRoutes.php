<?php

namespace app\Routes;

include "app/Controller/ProductController.php";

use app\Controller\ProductController;

class ProductRoutes
{
    public function handle($method, $path)
    {
        //jika request method GET dan PATH sama dengan '/api/product'
        if ($method === 'GET' && $path === '/api/product') {
            $controller = new ProductController();
            echo $controller->index();
        }
        //jika request  method GET dan PATH mengandung '/api/product/'
        if ($method === 'GET' && strpos($path, '/api/product/') === 0) {
            // extract ID dari path
            $pathParts = explode('/', $path);
            $id = $pathParts[count($pathParts) - 1];

            $controller = new ProductController();
            echo $controller->getById($id);
        }

        //jika request method post dan path sama dengan '/api/product'
        if ($method === 'POST' && $path === '/api/product') {
            $controller = new ProductController();
            echo $controller->insert();
        }

        //jika request method PUT dan PATH mengandung '/api/product/'
        if ($method === 'PUT' && strpos($path, '/api/product/') === 0) {
            //ectract ID dari path
            $pathParts = explode('/', $path);
            $id = $pathParts[count($pathParts) - 1];
            $controller = new ProductController();
            echo $controller->update($id);
        }

        //jika request method DELETE dan PATH mengandung '/api/product/'
        if ($method === 'DELETE' && strpos($path, '/api/product/') === 0) {
            //extract  ID dari path
            $pathParts = explode('/', $path);
            $id = $pathParts[count($pathParts) - 1];
            $controller = new ProductController();
            echo $controller->delete($id);
        }
    }
}
