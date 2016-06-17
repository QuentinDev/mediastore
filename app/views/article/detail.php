<div class="ui vertical stripe segment">
    <h1 class="ui header">Détail</h1>


    <div class="ui bottom attached active tab segment">
        <div class="ui items">
            <table class="ui celled table">
                <thead>
                <tr>
                    <th>Article</th>
                    <th><?= e($article->nom) ?></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <div class="ui ribbon label">Date d'édition</div>
                    </td>
                    <td><?= e($article->created_at->format('d/m/Y')) ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><?= e($article->description) ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Type</td>
                    <td><?= e($article->type->name) ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Prix</td>
                    <td><?= e($article->prix) ?><i class="euro icon"></i>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>Etat</td>
                    <td><?= ucfirst(e($article->status)) ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Quantité</td>
                    <td><?= \app\models\Article::getQuantityForId($article->id); ?></td>
                    <td></td>
                </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3">
                            <img class="detail_img" src="<?= \app\Helper\Html::getImgForArticle($article->id) ?>" alt="" />
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>