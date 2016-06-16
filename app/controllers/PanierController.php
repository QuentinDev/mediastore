<?php
/**
 * Created by PhpStorm.
 * User: web
 * Date: 15/06/2016
 * Time: 09:09
 */

namespace app\controllers;

use app\helper\Redirect;
use app\models\Cart;

class PanierController extends BaseController
{
    public function index() {
        $cart = new Cart();
        echo $this->render('panier/index.php', compact('cart'));
    }
    
    public function add($id) {
        $cart = new Cart();
        $cart->addProduct((int)$id, (int)1, true);
        Redirect::prev();
    }
    
    public function remove($id) {
        $cart = new Cart();
        $cart->removeProduct((int)$id);
        Redirect::prev();
    }

    public function update($id) {
        if (!isset($_POST['quantity']) || $_POST['quantity'] < 1) {
            Redirect::prev();
            return;
        }
        $cart = new Cart();
        $cart->addProduct((int)$id, (int)$_POST['quantity'], false);
        Redirect::prev();
    }
}