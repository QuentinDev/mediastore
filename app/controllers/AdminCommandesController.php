<?php
/**
 * Created by PhpStorm.
 * User: web
 * Date: 16/06/2016
 * Time: 13:31
 */

namespace app\controllers;

use app\models\Commande;
use Pecee\Http\Request;

class AdminCommandesController extends BaseController
{
    public function index() {
        $commandes = Commande::all();
        echo $this->render('admin/commandes/index.php', compact('commandes'));
    }

    

    public function updateStatus() {
        $status = Request::getInstance()->getInput()->get('status');
        $id = Request::getInstance()->getInput()->get('id');

        $commande = Commande::findOrFail($id);
        $commande->status = $status;

        return $commande->save();
    }
}