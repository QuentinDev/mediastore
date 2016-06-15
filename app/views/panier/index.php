<div class="ui vertical stripe segment">
    <div class="ui three stackable cards container">
        <table class="ui single line table">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart->getCart() as $item): ?>
                <tr>
                    <td><?= $item->name ?></td>
                    <td><?= $item->prix ?></td>
                    <td><?= $item->quantity ?></td>
                    <td>
                        <button class="ui circular negative icon button">
                            <i class="facebook icon"></i>
                        </button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>