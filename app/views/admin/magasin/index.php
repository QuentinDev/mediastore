<div class="ui vertical stripe segment">
    <h1>Liste des magasins</h1>
    <div class="ui three stackable cards container">
        <a href="<?= \app\helper\Link::url('AdminMagasinController@add')?>" style="float:right" class="positive ui button floated right">Ajouter</a>
        <?php app\helper\Auth::getFlash() ?>
        <table class="ui selectable inverted table">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Adresse</th>
                <th>Date d'ajout</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($magasins as $magasin): ?>

                <tr>
                    <td><?= $magasin->nom ?></td>
                    <td style="overflow: hidden;text-overflow: ellipsis;max-width: 370px;white-space: nowrap;"><?= $magasin->adresse ?></td>
                    <td><?= $magasin->created_at->diffForHumans() ?></td>
                    <td>
                        <div class="ui icon top left pointing dropdown button">
                            <i class="wrench icon"></i>
                            <div class="menu">
                                <div class="item"><a href="<?= \app\helper\Link::url('AdminMagasinController@edit', ['id' => $magasin->id])?>" class="ui blue button"><i class="edit icon"></i> Éditer</a></div>
                                <div class="item"><a href="<?= \app\helper\Link::url('AdminMagasinController@delete', ['id' => $magasin->id])?>" class="ui red button"><i class="trash icon"></i> Supprimer</a></div>
                            </div>
                        </div>
                    </td>
                </tr>

            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>$('.dropdown').dropdown();</script>
