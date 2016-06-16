<div class="column" style="max-width: 450px; margin: 0px auto; padding: 20px;">
	<form method="post" action="" class="ui large form" enctype="multipart/form-data">
		<div class="ui stacked segment">
			<h1 class="ui header">Édition de l'article</h1>
			<div class="ui divider"></div>

			<?php app\helper\Auth::getFlash() ?>

			<?php if(isset($article->id)): ?>
				<input value="<?= $article->id ?>" name="id" type="hidden">
			<?php endif; ?>
			<div class="field">
				<label for="nom">Titre</label>
				<input id="nom" value="<?= isset($article->nom) ? e($article->nom) : '' ?>" name="nom" placeholder="Star Wars" type="text" maxlength="255" required>
			</div>
			<div class="field">
				<label for="description">Description</label>
				<textarea id="description" name="description" placeholder="Il y a bien longtemps, dans une galaxie lointaine, très lointaine... " maxlength="255"  required><?= isset($article->description) ? e($article->description) : '' ?></textarea>
			</div>
			<div class="field">
				<label for="editeur">Éditeur</label>
				<input id="editeur" value="<?= isset($article->editeur) ? e($article->editeur) : '' ?>" name="editeur" placeholder="George Lucas" type="text" maxlength="255" required>
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
				<input id="prix" value="<?= isset($article->prix) ? e($article->prix) : '' ?>" name="prix" placeholder="49€" type="number" required>
			</div>

			<div class="field">
				<label for="seuil">Seuil</label>
				<input id="seuil" value="<?= isset($article->seuil) ? e($article->seuil) : '' ?>" name="seuil" placeholder="15" type="number" required>
			</div>

			<div class="field">
				<label for="articleImg">Image</label>
				<input id="articleImg" type="file" name="articleImg" />
			</div>

			<div class="ui buttons">
			  <a href="<?= \app\helper\Link::url('AdminController@listArticles')?>" class="ui button">Retour</a>
			  <div class="or" data-text="ou"></div>
			  <button type="submit" class="ui positive button">Envoyer</button>
			</div>
		</div>
	</form>
</div>
