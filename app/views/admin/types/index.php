<div class="ui vertical stripe segment">
    <h1>Liste des types</h1>

    <div class="ui three stackable cards container">
        <a href="<?= \app\helper\Link::url('AdminTypesController@add')?>" style="float:right" class="positive ui button floated right">Ajouter</a>
        <?php app\helper\Auth::getFlash() ?>
        <table class="ui selectable inverted table">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Date d'ajout</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($types as $type): ?>
                <tr>
                    <td><?= e($type->name) ?></td>
                    <td><?= e($type->created_at) ?></td>
                    <td>
                        <div class="ui icon top left pointing dropdown button">
                            <i class="wrench icon"></i>
                            <div class="menu">
                                <div class="item"><a href="<?= \app\helper\Link::url('AdminTypesController@edit', ['id' => $type->id])?>" class="ui blue button"><i class="edit icon"></i> Éditer</a></div>
                                <div class="item"><a href="<?= \app\helper\Link::url('AdminTypesController@delete', ['id' => $type->id])?>" class="ui red button"><i class="trash icon"></i> Supprimer</a></div>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>