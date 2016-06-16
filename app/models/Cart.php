<?php

namespace app\models;

use Carbon\Carbon;

class Cart {

    protected $sess = null;
    protected $lastAdded = null;

    public function __construct() {
        $this->getSessionCart();
    }

    public function __destruct() {
        unset($this->sess);
    }

    public function addProduct($id, $quant=1, $addQuant=true) {
        $id = (int)$id;

        // must be modified
        $item = Article::findOrFail($id);

        // delete if 0 quantity
        if($quant == 0) {
            unset($this->sess[$id]);
        } else {

            $this->lastAdded = $id;

            // if not yet set, add into cart
            if(!isset($this->sess[$id])) {
                $this->sess[$id] = $item;
                $this->sess[$id]['quantity'] = $quant;
                // add the quantity
            } else if($addQuant) {
                $this->sess[$id]['quantity'] += $quant;
            } else if(!$addQuant) {
                $this->sess[$id]['quantity'] = $quant;
            }
        }
        return $this->setSessionCart();
    }

    public function removeProduct($id, $quant=0){
        if($quant == 0) {
            return $this->addProduct($id, 0);
        } else {
            $currentQuant = isset($this->sess[$id]['quantity']) ? $this->sess[$id]['quantity'] : 0;
            $productsRemaining = $currentQuant - $quant;
            if($productsRemaining <= 0) {
                return $this->removeProduct($id);
            } else {
                $this->sess[$id]['quantity'] = $productsRemaining;
                return $this->setSessionCart();
            }
        }
    }

    public function viewCart() {
        echo '<pre>';
        if (isset($_SESSION['cart'])) {
            print_r($_SESSION['cart']);
        }
        echo '</pre>';
    }

    public function cartCount() {
        return count($this->sess);
    }

    public function getCart() {
        return isset($_SESSION['cart'])? $_SESSION['cart'] : [];
    }

    public function clearCart() {
        $_SESSION['cart'] = [];
    }

    public function getTotalPrice() {
        $price = 0;
        foreach ($this->getCart() as $item) {
            $price += $item['quantity'] * $item['prix'];
        }
        return $price;
    }

    public function getDateLivraison() {
        $drp = 1;
        foreach ($this->getCart() as $item) {
            if (Article::getQuantityForId($item['id']) < $item['quantity'])
                $drp++;
        }
        $drp = ($drp != 1) ? 3 : 1;
        return Carbon::now()->addDays(2 +  $drp);
    }

    protected function setSessionCart() {
        $_SESSION['cart'] = $this->sess;
        return true;
    }

    protected function getSessionCart() {
        $this->sess = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
        return true;
    }

}

