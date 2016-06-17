<div class="ui vertical stripe segment">
    <div class="column" style="max-width: 450px; margin: 0px auto; padding: 20px;">
        <?php app\helper\Auth::getFlash() ?>
        <form method="post" action="" class="ui large form">
            <div class="ui stacked segment">
                <h1 class="ui header">Se connecter</h1>
                <div class="ui divider"></div>
                <div class="field">
                    <label for="login">Login</label>
                    <input id="login" name="login" placeholder="login" type="text" required>
                </div>
                <div class="field">
                    <label for="password">Mot de passe</label>
                    <input id="password" name="password" placeholder="Mot de passe" type="password" required>
                </div>
                <button class="ui fluid large teal submit button" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>