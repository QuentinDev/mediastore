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
        $commandes = Auth::getUser()->commandes;
        echo $this->render('commandes/index.php', compact('commandes'));
    }

    public function add() {
        $cart = new Cart();
        if(count($cart->getCart()) == 0){
            Redirect::url('ArticlesController@nouveautes');
        }
        $user = Auth::getUser();
        $cardType = Card::getTypeCard();
        ksort($cardType);
        echo $this->render('commandes/add.php', compact('cart', 'user', 'cardType'));
    }

    public function saveAdd() {
        $cart = new Cart();
        if (!Card::checkCard() && count($cart->getCart()) === 0) {
            Redirect::prev();
        }

        $commande = new Commande();
        $commande->user_id = Auth::getUser()->id;
        $commande->status = 'en préparation';
        $commande->number = Request::getInstance()->getInput()->get('number');
        $commande->type = Request::getInstance()->getInput()->get('type');
        $commande->cvc = Request::getInstance()->getInput()->get('cvc');
        $commande->year = Request::getInstance()->getInput()->get('year');
        $commande->month = Request::getInstance()->getInput()->get('month');
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

        @mail($user->email, 'Validation de la commande.', "Vous allez recevoir votre colis le {$commande->delivery_time}. Cordialement, l'équipe MédiaStore");
        Auth::setFlash("Votre commande a été validée", "positive");
        Redirect::url('CommandesController@index');
    }
}
