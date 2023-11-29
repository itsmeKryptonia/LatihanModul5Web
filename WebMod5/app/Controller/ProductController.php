<?php

namespace app\Controller;

include "app/Traits/ApiResponseFormatter.php";
include "app/Models/Product.php";

use app\Models\Product;
use app\Traits\ApiResponseFormatter;

class ProductController
{
    //pakai trait yang sudah dibuat
    use ApiResponseFormatter;

    public function index()
    {
        //definisikan object model product yang sudha dibuat
        $productModel = new Product();
        //panggil fungsi get all product 
        $response = $productModel->findAll();
        //return $response dengan melakukan formatting terlabih dahulu menggunakan trait yang sudah di panggil
        return $this->apiResponse(200, "succes", $response);
    }

    public function getById($id)
    {
        $productModel = new Product();
        $response = $productModel->findById($id);
        return $this->apiResponse(200, "succes", $response);
    }

    public function insert()
    {
        //tangkap input json
        $jsonInput = file_get_contents('php://input');
        $inputData = json_decode($jsonInput, true);
        //validasi apakah input valid
        if (json_last_error()) {
            return $this->apiResponse(400, "error invalid input", null);
        }
        // lanjut jika tidak eror
        $productModel = new Product();
        $response = $productModel->create([
            "product_name" => $inputData['product_name']
        ]);
        return $this->apiResponse(200, "succes", $response);
    }

    public function update($id)
    {
        //tangkap input json
        $jsonInput = file_get_contents('php://input');
        $inputData = json_decode($jsonInput, true);
        //validasi apakah input valid
        if (json_last_error()) {
            return $this->apiResponse(400, "error invalid input", null);
        }

        // lanjut jika tidak eror
        $productModel = new Product();
        $response = $productModel->update([
            "product_name" => $inputData['product_name']
        ], $id);

        return $this->apiResponse(200, "succes", $response);
    }

    public function delete($id)
    {
        $productModel = new Product();
        $response = $productModel->destroy($id);

        return $this->apiResponse(200, "succes", $response);
    }
}
