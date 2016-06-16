<div class="ui vertical stripe segment">
    <h1 class="ui header">Valider sa commande</h1>
    <div class="ui three stackable cards container">
        <?php app\helper\Auth::getFlash() ?>
        <table class="ui selectable single line table">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Prix unitaire TTC</th>
                    <th>Quantité</th>
                    <th>Stock</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart->getCart() as $item): ?>
                <?php $stock = app\models\Article::getQuantityForId($item->id); ?>
                <tr>
                    <td>
                        <b><?= e($item->nom) ?></b><br>
                        <?= e($item->description) ?>
                    </td>
                    <td><?= e($item->prix) ?><small>€</small></td>
                    <td>
                        <form method="post" action="<?= \app\helper\Link::url('PanierController@update', ['id' => $item->id])?>">
                            <div class="ui input disabled">
                                <input type="number" name="quantity" value="<?= e($item->quantity) ?>" min="1" required>
                            </div>
                        </form>
                    </td>
                    <td>
                        <?= e($stock) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot class="full-width">
                <tr>
                    <th colspan="16" class="ui right floated">
                        Total <?= $cart->getTotalPrice() ?> € TTC
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>

    <form class="ui form attached fluid segment" id="addCommande" method="post" action="<?= \app\helper\Link::url('CommandesController@saveAdd')?>">
        <div class="ui vertically divided grid">
            <div class="two column row">
                <div class="column">
                    <div class="two fields">
                        <div class="field">
                            <label>Nom</label>
                            <input placeholder="Picard" type="text" value="<?= e($user->nom) ?>" name="nom" required>
                        </div>
                        <div class="field">
                            <label>Prenom</label>
                            <input placeholder="Jean-Luc" type="text" value="<?= e($user->prenom) ?>" name="prenom" required>
                        </div>
                    </div>
                    <div class="field">
                        <label>Adresse</label>
                        <input type="text" placeholder="12 Place Tobie Robatel" value="<?= e($user->adresse) ?>" name="adresse" required>
                    </div>
                    <div class="field">
                        <label>Code Postal</label>
                        <input type="number" placeholder="69003" value="<?= e($user->cp) ?>" name="cp" required>
                    </div>
                    <div class="field">
                        <label>Téléphone</label>
                        <input type="tel" placeholder="03033033" value="<?= e($user->tel) ?>" name="tel" required>
                    </div>
                    <div class="inline field">
                        <div class="ui checkbox">
                            <input type="checkbox" id="terms" required>
                            <label for="terms">J'accepte les termes et conditions</label>
                        </div>
                    </div>
                    <button type="submit" id="submit" class="ui blue submit button">Valider</button>
                </div>
                <div class="column" id="cardCheck">
                    <div class="ui message">
                        <div class="header">
                            <i class="info circle icon"></i>
                            Frais de port offerts
                        </div>
                        <hr>
                        <div class="header">
                            Date de livraison estimée :
                        </div>
                        <p><?= $cart->getDateLivraison(); ?></p>
                    </div>
                    <div class="ui message">
                        <div id="error" class="ui red message hide">La carte n'est pas valide</div>
                        <div class="field">
                            <label>Numéro de carte</label>
                            <input type="text" placeholder="0101100001010" name="number" id="number" required>
                        </div>
                        <div class="two fields">
                            <div class="field">
                                <label>Type</label>
                                <select class="ui fluid dropdown" name="type" required>
                                    <?php foreach ($cardType as $key => $value): ?>
                                        <option value="<?= e($key) ?>"><?= ucfirst(e($key)) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="field">
                                <label>Année</label>
                                <input placeholder="2016" type="number"  name="year" id="year" required>
                            </div>
                            <div class="field">
                                <label>Mois</label>
                                <input placeholder="12" min="1" max="12" type="number" name="month" id="month" required>
                            </div>
                        </div>
                        <div class="field">
                            <label>Cryptogramme</label>
                            <input type="number" placeholder="333" min="100" max="999" name="cvc" id="cvc" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
