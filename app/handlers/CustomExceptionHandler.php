<?php

namespace app\handlers;

use Pecee\Handler\IExceptionHandler;
use Pecee\Http\Request;
use Pecee\SimpleRouter\RouterEntry;

class CustomExceptionHandler implements IExceptionHandler {

    public function handleError( Request $request, RouterEntry $router = null, \Exception $error) {
        if($error->getCode() === 404) {
            echo 'error 404';
        }
    }

}