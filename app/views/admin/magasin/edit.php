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

    <form method="post" action="" class="ui large form" enctype="multipart/form-data">
        <div class="ui stacked segment">
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
</div>
