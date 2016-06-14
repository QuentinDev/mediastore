<div class="column" style="max-width: 450px; margin: 0px auto; padding: 20px;">
	<form method="post" action="" class="ui large form">
		<div class="ui stacked segment">
		<div class="field">
			<label>Login</label>
			<input name="login" placeholder="login" type="text" required>
		</div>
		<div class="field">
			<label>E-mail</label>
			<input name="email" placeholder="E-mail" type="email" required>
		</div>
		<div class="field">
			<label>Mot de passe</label>
			<input name="password" placeholder="Mot de passe" type="password" required>
		</div>
		<div class="field">
			<label>Nom</label>
			<input name="nom" placeholder="Nom" type="text" required>
		</div>
		<div class="field">
			<label>Prénom</label>
			<input name="prenom" placeholder="Prénom" type="text" required>
		</div>
		<div class="field">
			<label>Adresse</label>
			<input name="adresse" placeholder="adresse" type="text" required>
		</div>
		<div class="field">
			<label>Code postal</label>
			<input name="cp" placeholder="Code postal" type="number" min="0" max="99999" required>
		</div>
		<div class="field">
			<label>Téléphone</label>
			<input name="tel" placeholder="Téléphone" type="tel" required>
		</div>
		<?php app\helper\Html::displayError($error) ?>
		<button class="ui fluid large teal submit button" type="submit">Submit</button>
	</div>
	</form>
</div>
