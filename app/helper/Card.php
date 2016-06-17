<?php
/**
 * Created by PhpStorm.
 * User: viller_m
 * Date: 15/06/2016
 * Time: 21:31
 */

namespace app\helper;

use Inacho\CreditCard;
use Pecee\Http\Request;

class Card extends CreditCard
{
    public static function checkCard() {
        $number = Request::getInstance()->getInput()->get('number');
        $type = Request::getInstance()->getInput()->get('type');
        $cvc = Request::getInstance()->getInput()->get('cvc');
        $year = Request::getInstance()->getInput()->get('year');
        $month = Request::getInstance()->getInput()->get('month');

        return (CreditCard::validCreditCard($number, $type)['valid']
            && CreditCard::validCvc($cvc, $type)
            && CreditCard::validDate($year, $month));
    }
    
    public static function getTypeCard(){
        return static::$cards;
    }
}