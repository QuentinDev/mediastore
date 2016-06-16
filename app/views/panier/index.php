<div class="ui vertical stripe segment">
    <h1 class="ui header">Mon panier</h1>
    <div class="ui three stackable cards container">
        <table class="ui selectable single line table">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Prix unitaire TTC</th>
                    <th>Quantité</th>
                    <th>Stock</th>
                    <th>Action</th>
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
                            <div class="ui input">
                                <input type="number" name="quantity" value="<?= e($item->quantity) ?>" min="1">
                            </div>
                        </form>
                    </td>
                    <td>
                        <?= $stock ?>
                    </td>
                    <td>
                        <a href="<?= \app\helper\Link::url('PanierController@remove', ['id' => $item->id])?>" class="ui circular negative icon button">
                            <i class="trash icon"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot class="full-width">
                <tr>
                    <th><strong>Total <?= $cart->getTotalPrice() ?> € TTC</strong></th>
                    <th colspan="14">
                        <a href="<?= \app\helper\Link::url('CommandesController@add')?>" class="ui right floated small primary labeled icon button">
                            <i class="payment icon"></i> Acheter
                        </a>
                    </th>
                </tr>
            </tfoot>
        </table>
        <div class="ui warning message">
            <div class="header">
                <i class="info circle icon"></i>
                Frais de port offerts
            </div>
        </div>
    </div>
</div>