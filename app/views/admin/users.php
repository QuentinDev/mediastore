<div class="ui vertical stripe segment">
    <h1>Liste des utilisateurs</h1>

    <div class="ui three stackable cards container">
        <a href="<?= \app\helper\Link::url('AdminController@addUser')?>" style="float:right" class="positive ui button floated right">Ajouter</a>
        <?php app\helper\Auth::getFlash() ?>
        <table class="ui selectable inverted table">
            <thead>
                <tr>
                    <th>Login</th>
                    <th>E-mail</th>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Adresse</th>
                    <th>Code postal</th>
                    <th>N° de téléphone</th>
                    <th>Type</th>
                    <th>Date d'inscription</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>

                <tr style="overflow: hidden;text-overflow: ellipsis;max-width: 370px;white-space: nowrap;">
                    <td><?= e($user->login) ?></td>
                    <td><?= e($user->email) ?></td>
                    <td><?= e($user->prenom) ?></td>
                    <td><?= e($user->nom) ?></td>
                    <td><?= e($user->adresse) ?></td>
                    <td><?= e($user->cp) ?></td>
                    <td><?= e($user->tel) ?></td>
                    <td><?= e($user->grade == 1 ? "Admin" : "Utilisateur") ?></td>
                    <td><?= e($user->created_at->diffForHumans()) ?></td>
                    <td>
                        <div class="ui icon top left pointing dropdown button">
                            <i class="wrench icon"></i>
                            <div class="menu">
                                <div class="item"><a href="<?= \app\helper\Link::url('AdminController@editUser', ['id' => $user->id])?>" class="ui blue button"><i class="edit icon"></i> Éditer</a></div>
                                <div class="item"><a href="<?= \app\helper\Link::url('AdminController@deleteUser', ['id' => $user->id])?>" class="ui red button"><i class="trash icon"></i> Supprimer</a></div>
                            </div>
                        </div>
                    </td>
                </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>