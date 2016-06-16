<div class="column" style="max-width: 450px; margin: 0px auto; padding: 20px;">
	<?php app\helper\Auth::getFlash() ?>
	<form method="post" action="" class="ui large form">
		<div class="ui stacked segment">
		<div class="field">
			<label for="login">Login</label>
			<input id="login" name="login" placeholder="login" type="text" required>
		</div>
		<div class="field">
			<label for="email">E-mail</label>
			<input id="email" name="email" placeholder="E-mail" type="email" required>
		</div>
		<div class="field">
			<label for="password">Mot de passe</label>
			<input id="password" name="password" placeholder="Mot de passe" type="password" required>
		</div>
		<div class="field">
			<label for="nom">Nom</label>
			<input id="nom" name="nom" placeholder="Nom" type="text" required>
		</div>
		<div class="field">
			<label for="prenom">Prénom</label>
			<input id="prenom" name="prenom" placeholder="Prénom" type="text" required>
		</div>
		<div class="field">
			<label for="adresse">Adresse</label>
			<input id="adresse" name="adresse" placeholder="adresse" type="text" required>
		</div>
		<div class="field">
			<label for="cp">Code postal</label>
			<input id="cp" name="cp" placeholder="Code postal" type="number" min="0" max="99999" required>
		</div>
		<div class="field">
			<label for="tel">Téléphone</label>
			<input id="tel" name="tel" placeholder="Téléphone" type="tel" required>
		</div>
		<button class="ui fluid large teal submit button" type="submit">Submit</button>
	</div>
	</form>
</div>
