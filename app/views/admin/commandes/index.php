<div class="ui vertical stripe segment">
    <h1>Liste des commandes</h1>
    <div class="ui three stackable cards container">
        <?php app\helper\Auth::getFlash() ?>
        <table class="ui selectable inverted table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Date de livraison estimée</th>
                    <th>Commande effectuée le</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($commandes as $commande): ?>
                <tr>
                    <td><?= e($commande->id) ?></td>
                    <td style="overflow: hidden;text-overflow: ellipsis;max-width: 370px;white-space: nowrap;"><?= e($commande->delivery_time) ?></td>
                    <td><?= e($commande->created_at) ?></td>
                    <td>
                        <form method="post" class="update_status">
                            <input class="hide" type="text" name="id" value="<?= $commande->id ?>">

                            <select class="ui fluid dropdown" name="status" required>
                                <?php foreach (['en préparation', 'prête', 'envoyée'] as $status): ?>
                                    <option  value="<?= $status ?>" <?= ($status == $commande->status)? 'selected': '' ?>><?= ucfirst($status) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>