<div class="column" style="max-width: 450px; margin: 0px auto; padding: 20px;">
    <form method="post" action="" class="ui large form" enctype="multipart/form-data">
        <div class="ui stacked segment">
            <?php app\helper\Auth::getFlash() ?>

            <?php if(isset($magasin->id)): ?>
                <input value="<?= $magasin->id ?>" name="id" type="hidden">
            <?php endif; ?>

            <div class="field">
                <label for="nom">Nom</label>
                <input id="nom" value="<?= isset($magasin->nom) ? $magasin->nom : '' ?>" name="nom" placeholder="LDLC" type="text" maxlength="255" required>
            </div>

            <div class="field">
                <label for="adresse">Adresse</label>
                <textarea id="adresse" name="adresse" placeholder="28 rue du lycée 69003 Lyon" maxlength="255" required><?= isset($magasin->adresse) ? $magasin->adresse : '' ?></textarea>
            </div>

            <div class="ui buttons">
                <a href="<?= \app\helper\Link::url('AdminMagasinController@index')?>" class="ui button">Retour</a>
                <div class="or" data-text="ou"></div>
                <button type="submit" class="ui positive button">Envoyer</button>
            </div>
        </div>
    </form>

    <?php if(isset($magasin->id)): ?>
    <form method="post" action="" class="ui large form">
        <div class="ui stacked segment">
            <div class="field">
                <label>Article à ajouter</label>
                <select class="ui search dropdown" name="article_id">
                    <?php foreach ($articles as $article): ?>
                        <option value="<?= $article->id ?>"><?= ucfirst($article->nom) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="field">
                <label for="number">Quantité</label>
                <input type="number" id="number" name="number" placeholder="1" required>
            </div>

            <div class="field">
                <label for="seuil">Seuil</label>
                <input type="number" id="seuil" name="seuil" placeholder="1" required>
            </div>

            <div class="ui buttons">
                <a href="<?= \app\helper\Link::url('AdminMagasinController@index')?>" class="ui button">Retour</a>
                <div class="or" data-text="ou"></div>
                <button type="submit" class="ui positive button">Envoyer</button>
            </div>
        </div>
    </form>
    <div class="ui large form">
        <div class="ui stacked segment">
            <h4 class="heading">Articles du magasin</h4>
            <table class="ui selectable table">
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Stock</th>
                    <th>Seuil</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($magasin->articles as $article): ?>
                    <tr>
                        <td><?= $article->nom ?></td>
                        <td style="overflow: hidden;text-overflow: ellipsis;max-width: 370px;white-space: nowrap;">
                            <form method="post" action="<?= \app\helper\Link::url('AdminMagasinController@addQuantity', ['id' => $magasin->id, 'articleid' => $article->id]) ?>" class="ui large form">
                                <input type="number" name="number" value="<?= $article->pivot->quantity ?>" min="1">
                            </form>
                        </td>
                        <td style="overflow: hidden;text-overflow: ellipsis;max-width: 370px;white-space: nowrap;">
                            <form method="post" action="<?= \app\helper\Link::url('AdminMagasinController@addQuantity', ['id' => $magasin->id, 'articleid' => $article->id]) ?>" class="ui large form">
                                <input type="number" name="seuil" value="<?= $article->pivot->seuil ?>" min="1">
                            </form>
                        </td>
                        <td>
                            <div class="item"><a href="<?= \app\helper\Link::url('AdminMagasinController@delItem', ['id' => $magasin->id, 'articleid' => $article->id]) ?>" class="ui red button"><i class="trash icon"></i> Supprimer</a></div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php endif; ?>
</div>
