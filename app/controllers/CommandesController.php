<?php
namespace app\controllers;

use app\helper\Auth;
use app\helper\Card;
use app\helper\Redirect;
use app\models\Cart;
use app\models\Commande;
use app\models\User;
use Carbon\Carbon;
use Pecee\Http\Request;

class CommandesController extends BaseController
{
    public function index() {
        $commandes = Commande::all();
        echo $this->render('commandes/index.php', compact('commandes'));
    }

    public function add() {
        $cart = new Cart();
        $user = Auth::getUser();
        echo $this->render('commandes/add.php', compact('cart', 'user'));
    }

    public function saveAdd() {
        if (!Card::checkCard()) {
            Redirect::prev();
        }


        $cart = new Cart();
        $commande = new Commande();
        $commande->user_id = Auth::getUser()->id;
        $commande->status = 'en préparation';
        $commande->delivery_time = $cart->getDateLivraison();
        $commande->created_at = Carbon::now();
        $commande->updated_at = Carbon::now();
        $commande->save();

        foreach ($cart->getCart() as $item)
            $commande->articles()->attach($item->id, ['quantity' => $item->quantity]);

        $user = User::findOrFail(Auth::getUser()->id);
        $user->nom = Request::getInstance()->getInput()->get('nom');
        $user->prenom = Request::getInstance()->getInput()->get('prenom');
        $user->cp = Request::getInstance()->getInput()->get('cp');
        $user->adresse = Request::getInstance()->getInput()->get('adresse');
        $user->tel = Request::getInstance()->getInput()->get('tel');
        $user->save();

        $cart->clearCart();

        Redirect::url('CommandesController@index');
    }
}