<?php

namespace app\Traits;
//melakukan formating terhadap reponse json_decode
//untuk formatting response
trait ApiResponseFormatter
{
    public function apiResponse($code = 200, $message = "succes", $data = [])
    {
        //Dari parameter akan di format menjadi seperti dibawah ini
        return json_encode([
            "code" => $code,
            "messages" => $message,
            "data" => $data,
        ]);
    }
}
