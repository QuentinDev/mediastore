<?php
/**
 * Created by PhpStorm.
 * User: viller_m
 * Date: 15/06/2016
 * Time: 20:14
 */

namespace app\controllers;

use app\helper\Card;

class JsonController extends BaseController
{
    public function checkCard() {
        echo Card::checkCard();
    }
}