<div class="column" style="max-width: 450px; margin: 0px auto; padding: 20px;">
    <form method="post" action="" class="ui large form" enctype="multipart/form-data">
        <div class="ui stacked segment">
            <h1 class="ui header">Édition du type</h1>
            <div class="ui divider"></div>

            <?php app\helper\Auth::getFlash() ?>

            <?php if(isset($typeitem->id)): ?>
                <input value="<?= $typeitem->id ?>" name="id" type="hidden">
            <?php endif; ?>

            <div class="field">
                <label for="name">Nom</label>
                <input id="name" value="<?= isset($typeitem->name) ? e($typeitem->name) : '' ?>" name="name" placeholder="DVD" type="text" maxlength="255" required>
            </div>

            <div class="ui buttons">
                <a href="<?= \app\helper\Link::url('AdminTypesController@index')?>" class="ui button">Retour</a>
                <div class="or" data-text="ou"></div>
                <button type="submit" class="ui positive button">Envoyer</button>
            </div>
        </div>
    </form>
</div>
