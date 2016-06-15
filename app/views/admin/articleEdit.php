<div class="column" style="max-width: 450px; margin: 0px auto; padding: 20px;">
	<form method="post" action="" class="ui large form">
		<div class="ui stacked segment">
		<div class="field">
			<label>Titre</label>
			<input name="name" placeholder="Titre" type="text" maxlength="255" required>
		</div>
		<div class="field">
			<label>Description</label>
			<input name="description" placeholder="Description" type="textarea" maxlength="255"  required>
		</div>
		<div class="field">
			<label>Éditeur</label>
			<input name="editeur" placeholder="Editeur" type="text" maxlength="255" required>
		</div>
		<div class="field">
			<label>Type</label>
			<select name="typeId">
				<option value=""></option>
			</select>
			<input name="prix" placeholder="Prix" type="number" required>
		</div>
		<div class="field">
			<label>Prix</label>
			<input name="prix" placeholder="Prix" type="number" required>
		</div>

		<?php app\helper\Html::displayError($error) ?>
		<button class="ui fluid large teal submit button" type="submit">Submit</button>
	</div>
	</form>
</div>
