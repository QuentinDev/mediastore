<div class="ui vertical stripe segment">
    <div class="ui three stackable cards container">
        <table class="ui single line table">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Prix unitaire</th>
                    <th>Quantité</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart->getCart() as $item): ?>
                <tr>
                    <td>
                        <b><?= $item->nom ?></b><br>
                        <?= $item->description ?>
                    </td>
                    <td><?= $item->prix ?><small>€</small></td>
                    <td>
                        <form method="post" action="<?= \app\helper\Link::url('PanierController@update', ['id' => $item->id])?>">
                            <div class="ui input">
                                <input type="number" name="quantity" value="<?= $item->quantity ?>" min="1">
                            </div>
                        </form>
                    </td>
                    <td>
                        <a href="<?= \app\helper\Link::url('PanierController@remove', ['id' => $item->id])?>" class="ui circular negative icon button">
                            <i class="trash icon"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>