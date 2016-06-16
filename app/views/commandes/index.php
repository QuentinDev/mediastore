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
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($commandes as $key => $item): ?>
                    <tr class="show-modal" data-id="<?= $key ?>">
                        <td><?= $key ?></td>
                        <td><?= $item->delivery_time ?></td>
                        <td><?= $item->created_at ?></td>
                        <td><?= $item->status ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <?php foreach ($commandes as $key => $item): ?>
                <div class="ui modal" id="<?= $key ?>">
                    <i class="close icon"></i>
                    <div class="header">
                        Facture <?= $key ?>
                    </div>
                    <div class="image content">
                        <div class="description">
                            <div class="ui header">Voici un résumé de votre commande</div>
                            <div class="ui content">
                                <ul>
                                    <li><b>Date de livraison estimée:</b> <?= $item->delivery_time ?></li>
                                    <li><b>Adresse de livraison:</b> <?= $item->user->adresse ?> <?= $item->user->cp ?></li>

                                    <li><b>Téléphone:</b> <?= $item->user->tel ?></li>

                                </ul>
                            </div>
                            <div class="ui items">

                                <?php foreach ($item->articles as $article): ?>
                                    <div class="item">
                                        <div class="image">
                                            <img src="/images/wireframe/image.png">
                                        </div>
                                        <div class="content">
                                            <a class="header"><?= $article->nom ?> (<?= $article->type->name ?>)</a>
                                            <div class="meta">
                                                Quantité: <?= $article->pivot->quantity ?>
                                                Prix: <?= $article->prix ?><i class="euro icon"></i>
                                            </div>
                                            <div class="description">
                                                <p><?= $article->description ?></p>
                                            </div>
                                            <div class="extra">
                                                <b>Total: <?= $article->prix * $article->pivot->quantity ?><i class="euro icon"></i></b>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div class="actions">
                        <div class="ui positive right labeled icon button">
                            Réduire
                            <i class="checkmark icon"></i>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>