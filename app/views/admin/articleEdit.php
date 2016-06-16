<div class="column" style="max-width: 450px; margin: 0px auto; padding: 20px;">
	<form method="post" action="" class="ui large form" enctype="multipart/form-data">
		<div class="ui stacked segment">
			<?php if(isset($article->id)): ?>
				<input value="<?= $article->id ?>" name="id" type="hidden">
			<?php endif; ?>
			<div class="field">
				<label for="nom">Titre</label>
				<input id="nom" value="<?= isset($article->nom) ? $article->nom : '' ?>" name="nom" placeholder="Star Wars" type="text" maxlength="255" required>
			</div>
			<div class="field">
				<label for="description">Description</label>
				<textarea id="description" name="description" placeholder="Il y a bien longtemps, dans une galaxie lointaine, très lointaine... " maxlength="255"  required><?= isset($article->description) ? $article->description : '' ?></textarea>
			</div>
			<div class="field">
				<label for="editeur">Éditeur</label>
				<input id="editeur" value="<?= isset($article->editeur) ? $article->editeur : '' ?>" name="editeur" placeholder="George Lucas" type="text" maxlength="255" required>
			</div>
			<div class="field">
				<label>Statut</label>
				<select class="ui search dropdown" name="status">
					<option value="disponible" <?= (isset($article) && $article->status === "disponible") ? "selected" : " "?>>Disponible</option>
					<option value="nouveauté" <?= (isset($article) && $article->status === "nouveauté") ? "selected" : " "?>>Nouveauté</option>
					<option value="hors stock" <?= (isset($article) && $article->status === "hors stock") ? "selected" : " "?>>Hors stock</option>
				</select>
			</div>
			<div class="field">
				<label>Type</label>
				<select class="ui search dropdown" name="typeId">
					<?php foreach($types as $type): ?>
						<option value="<?= $type->id ?>" <?= (isset($article) && $type->id === $article->type_id) ? "selected" : " "?> > <?= $type->name ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="field">
				<label for="prix">Prix (en €)</label>
				<input id="prix" value="<?= isset($article->prix) ? $article->prix : '' ?>" name="prix" placeholder="49€" type="number" required>
			</div>
			<div class="field">
				<label for="articleImg">Image</label>
				<input id="articleImg" type="file" name="articleImg" />
			</div>

			<?php app\helper\Html::displayError($msg, $msgType) ?>
			<!-- <button class="ui fluid large teal submit button" type="submit">Submit</button> -->
			<div class="ui buttons">
			  <a href="<?= \app\helper\Link::url('AdminController@listArticles')?>" class="ui button">Retour</a>
			  <div class="or" data-text="ou"></div>
			  <button type="submit" class="ui positive button">Envoyer</button>
			</div>
		</div>
	</form>
</div>
