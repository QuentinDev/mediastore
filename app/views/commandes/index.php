<div class="ui vertical stripe segment">
    <div class="ui three stackable cards container">
        <?php if (count($commandes) == 0) : ?>
            <h3>Pas de commandes</h3>
        <?php else: ?>
            <table class="ui selectable single line table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date de livraison estimée</th>
                        <th>Commande effectuée le</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($commandes as $key => $item): ?>
                    <tr>
                        <td><?= $key ?></td>
                        <td><?= $item->delivery_time ?></td>
                        <td><?= $item->created_at ?></td>
                        <td><?= $item->status ?></td>
                        <td>
                            <a href="<?= \app\helper\Link::url('PanierController@remove', ['id' => $item->id])?>" class="ui circular negative icon button">
                                <i class="trash icon"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>