<?php
/**
 * Created by PhpStorm.
 * User: web
 * Date: 15/06/2016
 * Time: 09:09
 */

namespace app\controllers;

use app\helper\Link;
use app\helper\Redirect;
use app\models\Cart;

class PanierController extends BaseController
{
    public function index() {
        $cart = new Cart();
        echo $this->render('panier/index.php', compact('cart'));
    }
    
    public function add($id) {
         Redirect::prev();
    }
    
    public function remove($id) {

    }

    public function update($id) {

    }
}