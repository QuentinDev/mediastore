<div class="ui vertical stripe segment">
    <div class="ui three stackable cards container">
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
                        <b><?= $item->nom ?></b><br>
                        <?= $item->description ?>
                    </td>
                    <td><?= $item->prix ?><small>€</small></td>
                    <td>
                        <form method="post" action="<?= \app\helper\Link::url('PanierController@update', ['id' => $item->id])?>">
                            <div class="ui input disabled">
                                <input type="number" name="quantity" value="<?= $item->quantity ?>" min="1">
                            </div>
                        </form>
                    </td>
                    <td>
                        <?= $stock ?>
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

    <form class="ui form attached fluid segment" method="post" action="<?= \app\helper\Link::url('CommandesController@saveAdd')?>">
        <div class="ui vertically divided grid">
            <div class="two column row">
                <div class="column">
                    <div class="two fields">
                        <div class="field">
                            <label>Nom</label>
                            <input placeholder="Picard" type="text" value="<?= $user->nom ?>" name="nom">
                        </div>
                        <div class="field">
                            <label>Prenom</label>
                            <input placeholder="Jean-Luc" type="text" value="<?= $user->prenom ?>" name="prenom">
                        </div>
                    </div>
                    <div class="field">
                        <label>Adresse</label>
                        <input type="text" placeholder="12 Place Tobie Robatel" value="<?= $user->adresse ?>" name="adresse">
                    </div>
                    <div class="field">
                        <label>Code Postal</label>
                        <input type="number" placeholder="69003" value="<?= $user->cp ?>" name="cp">
                    </div>
                    <div class="field">
                        <label>Téléphone</label>
                        <input type="tel" placeholder="03033033" value="<?= $user->tel ?>" name="tel">
                    </div>
                    <div class="inline field">
                        <div class="ui checkbox">
                            <input type="checkbox" id="terms" required>
                            <label for="terms">J'accepte les termes et conditions</label>
                        </div>
                    </div>
                    <button type="submit" class="ui blue submit button">Valider</button>
                </div>
                <div class="column">
                    <div class="ui message">
                        <div class="header">
                            Date de livraison estimée :
                        </div>
                        <p><?= $cart->getDateLivraison(); ?></p>
                    </div>
                    <div class="ui message">
                        <div class="field">
                            <label>Numéro de carte</label>
                            <input type="text" placeholder="0101100001010" value="" name="cbnumber">
                        </div>
                        <div class="field">
                            <label>Date d'expiration</label>
                            <input type="text" placeholder="12/02" value="<?= $user->adresse ?>" name="adresse">
                        </div>
                        <div class="field">
                            <label>Cryptogramme</label>
                            <input type="text" placeholder="12 Place Tobie Robatel" value="<?= $user->adresse ?>" name="adresse">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>