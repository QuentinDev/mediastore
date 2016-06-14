<div class="column" style="max-width: 450px; margin: 0px auto; padding: 20px;">
	<form method="post" action="" class="ui large form">
		<div class="ui stacked segment">
		<div class="field">
			<label>Login</label>
			<input name="login" placeholder="login" type="text" required>
		</div>
		<div class="field">
			<label>Mot de passe</label>
			<input name="password" placeholder="Mot de passe" type="password" required>
		</div>
		<?php app\helper\Html::displayError($error) ?>
		<button class="ui fluid large teal submit button" type="submit">Submit</button>
	</div>
	</form>
</div>
