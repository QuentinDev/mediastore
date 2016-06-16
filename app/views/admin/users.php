<div class="ui vertical stripe segment">
	<h1>Liste des utilisateurs</h1>
	<div class="ui three stackable cards container">
		<a href="<?= \app\helper\Link::url('AdminController@addUser')?>" style="float:right" class="positive ui button floated right">Ajouter</a>
		<table class="ui selectable inverted table">
			<thead>
				<tr>
					<th>Login</th>
					<th>E-mail</th>
					<th>Prénom</th>
					<th>Nom</th>
					<th>Adresse</th>
					<th>Code postal</th>
					<th>N° de téléphone</th>
					<th>Type</th>
					<th>Date d'inscription</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($users as $user): ?>

					<tr style="overflow: hidden;text-overflow: ellipsis;max-width: 370px;white-space: nowrap;">
						<td><?= $user->login ?></td>
						<td><?= $user->email ?></td>
						<td><?= $user->prenom ?></td>
						<td><?= $user->nom ?></td>
						<td><?= $user->adresse ?></td>
						<td><?= $user->cp ?></td>
						<td><?= $user->tel ?></td>
						<td><?= $user->grade == 1 ? "Admin" : "Utilisateur" ?></td>
						<td><?= $user->created_at->diffForHumans() ?></td>
						<td>
							<div class="ui icon top left pointing dropdown button">
								<i class="wrench icon"></i>
								<div class="menu">
									<div class="item"><a href="<?= \app\helper\Link::url('AdminController@editUser', ['id' => $user->id])?>" class="ui blue button"><i class="edit icon"></i> Éditer</a></div>
									<div class="item"><a href="<?= \app\helper\Link::url('AdminController@deleteUser', ['id' => $user->id])?>" class="ui red button"><i class="trash icon"></i> Supprimer</a></div>
								</div>
							</div>
						</td>
					</tr>

				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

<script>$('.dropdown').dropdown();</script>
