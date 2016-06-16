<div class="ui top attached tabular menu" xmlns="http://www.w3.org/1999/html">
        <div class="active item">Détail</div>
</div>
<div class="ui bottom attached active tab segment">
        <div class="ui items">
                <?php if (\app\models\Article::getQuantityForId($article->id) < \app\models\Article::getQuantityForId($article->id)): ?>
                <div class="ui warning message">
                        <div class="header">
                                Attention! Le seuil minimun pour cette nouveauté est atteint! Veuillez passer commande auprès de notre fournisseur.
                        </div>

                </div>
                <?php endif; ?>
                <table class="ui celled table">
                        <thead>
                                <tr>
                                        <th>Article</th>
                                        <th><?=  $article->nom ?></th>
                                        <th></th>
                                </tr>
                        </thead>
                        <tbody>
                        <tr>
                                <td>
                                        <div class="ui ribbon label">Date d'édition</div>
                                </td>
                                <td><?= $article->created_at->format('d/m/Y') ?></td>
                                <td></td>
                        </tr>
                        <tr>
                                <td>Description</td>
                                <td><?= $article->description ?></td>
                                <td></td>
                        </tr>
                        <tr>
                                <td>Type</td>
                                <td><?= $article->type->name ?></td>
                                <td></td>
                        </tr>
                        <tr>
                                <td>Prix</td>
                                <td><?= $article->prix ?><i class="euro icon"></i>
                                </td>
                                <td></td>
                        </tr>
                        <tr>
                                <td>Etat</td>
                                <td><?= ucfirst($article->status) ?></td>
                                <td></td>
                        </tr>
                        <tr>
                                <td>Quantité</td>
                                <td><?= \app\models\Article::getQuantityForId($article->id); ?></td>
                                <td></td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr><th colspan="3">
                                    <img class="detail_img" src="<?= \app\Helper\Html::getImgForArticle($article->id) ?>" alt="" />
                            </th>
                        </tr></tfoot>
                </table>
        </div>
</div>