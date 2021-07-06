<?php
namespace App;

use validator\validator;
use http\httpRequest;
use http\handlerRequest;
use http\httpResponse;

//use Exception;

class app
{
    protected $objRequest = null;
    protected $objValidate = null;
    protected $objHandler = null;



    function __construct()
    {
        $this->objRequest = new httpRequest();
        $this->objValidate = new Validator();
        $this->objHandler = new handlerRequest();

    }


    public function run(){


        $response =  $this->objHandler->handle($this->objRequest);



        foreach ($response->getHeaders() as $name=>$value) {
            \header("$name:$value");

        }

        \http_response_code($response->getStatus());




    }




}