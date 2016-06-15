<div class="ui vertical stripe segment">
	<div class="ui three stackable cards container">
		<table class="ui selectable inverted table">
			<thead>
				<tr>
					<th>Titre</th>
					<th>Description</th>
					<th>Type</th>
					<th>Prix</th>
					<th>Éditeur</th>
					<th>Date d'ajout</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($articles as $article): ?>

					<tr>
						<td><?= $article->nom ?></td>
						<td style="overflow: hidden;text-overflow: ellipsis;max-width: 370px;white-space: nowrap;"><?= $article->description ?></td>
						<td><?= $article->type->name ?></td>
						<td><?= $article->prix ?></td>
						<td><?= $article->editeur ?></td>
						<td><?= $article->created_at->diffForHumans() ?></td>
						<td>
							<div class="ui buttons">
							  <a href="<?= \app\helper\Link::url('AdminController@editArticle', ['id' => $article->id])?>" class="ui blue button"><i class="edit icon"></i> Éditer</a>
							  <a href="<?= \app\helper\Link::url('AdminController@deleteArticle', ['id' => $article->id])?>" class="ui red button"><i class="trash icon"></i> Supprimer</a>
							</div>
						</td>
					</tr>

				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
