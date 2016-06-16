<?php
/**
 * Created by PhpStorm.
 * User: web
 * Date: 16/06/2016
 * Time: 13:31
 */

namespace app\controllers;

use app\helper\Auth;
use app\helper\Redirect;
use app\models\Magasin;
use Pecee\Http\Request;

class AdminMagasinController extends BaseController
{
    public function index() {
        $magasins = Magasin::all();
        echo $this->render('admin/magasin/index.php', compact('magasins'));
    }

    public function add() {
        $nom = Request::getInstance()->getInput()->get('nom');
        $adresse = Request::getInstance()->getInput()->get('adresse');
        $magasin = new Magasin();
        if($nom && $adresse) {
            $magasin->nom = $nom;
            $magasin->adresse = $adresse;
            if ($magasin->save()) {
                Auth::setFlash("Magasin correctement ajouté", "positive");
            }else{
                Auth::setFlash("Une erreur est survenue, veuillez réessayer", "error");
            }
        }
        echo $this->render('admin/magasin/edit.php');
    }

    public function edit($id) {
        $nom = Request::getInstance()->getInput()->get('nom');
        $adresse = Request::getInstance()->getInput()->get('adresse');

        $magasin = Magasin::findOrFail($id);
        if($nom && $adresse) {
            $magasin->nom = $nom;
            $magasin->adresse = $adresse;
            if ($magasin->save()) {
                Auth::setFlash("Magasin correctement édité", "positive");
            }else{
                Auth::setFlash("Une erreur est survenue, veuillez réessayer", "error");
            }
        }

        echo $this->render('admin/magasin/edit.php', compact('magasin'));
    }
    
    public function addItem($id, $articleid) {
        
    }

    public function delItem($id, $articleid) {

    }

    public function delete($id) {
        Magasin::destroy($id);
        Redirect::prev();
    }
}