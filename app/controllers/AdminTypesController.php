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
use app\models\Type;
use Pecee\Http\Request;

class AdminTypesController extends BaseController
{
    public function index() {
        $types = Type::all();
        echo $this->render('admin/types/index.php', compact('types'));
    }

    public function add() {
        $name = Request::getInstance()->getInput()->get('name');
        $type = new Type();
        if($name) {
            $type->name = $name;

            if ($type->save()) {
                Auth::setFlash("Type correctement ajouté", "positive");
            }else{
                Auth::setFlash("Une erreur est survenue, veuillez réessayer", "error");
            }
        }
        echo $this->render('admin/types/edit.php');
    }

    public function edit($id) {
        $name = Request::getInstance()->getInput()->get('name');
        $typeitem = Type::findOrFail($id);

        if($name) {
            $typeitem->name = $name;

            if ($typeitem->save()) {
                Auth::setFlash("Type correctement édité", "positive");
            }else{
                Auth::setFlash("Une erreur est survenue, veuillez réessayer", "error");
            }
        }

        echo $this->render('admin/types/edit.php', compact('typeitem'));
    }

    public function delete($id) {
        Type::destroy($id);
        Redirect::prev();
    }
}