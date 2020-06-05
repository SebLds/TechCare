<?php $this->title = "Tableau de bord"; ?>

<link href="/Web/css/dashboardAdmin.css" rel="stylesheet">
<link href="/Web/css/button.css" rel="stylesheet">

<div id="body">

	<div class="users">
        <div class="title">
            <h1>Utilisateurs</h1>
        </div>
		<div class="action">
            <form class="search-bar" method="post" action="/admin/add-user-form">
                <button type="submit" class="btn add" name="button"><i class="fal fa-user-plus"></i>Ajouter</button>
            </form>

			<form class="search-bar" method="post" action="/admin/dashboard/result">
                <button class="sub-none" type="submit"><i class="fal fa-search fa-2x icon"></i></button>
                <input type="text" autocomplete="off" class="search-input" name='search' placeholder="Rechercher des utilisateurs...">
            </form>
		</div>
	</div>

	<div class="users line">

		<div class="users">
	        <div class="title">
	            <h1>Test</h1>
	        </div>
			<div class="action">

				<div class="btn-box">
					<form method="post" action="/admin/add-test-form">
							<a><button class="btn add" type="submit" name="button"><i class="fal fa-tachometer-alt-fastest"></i>Ajouter un type de test</button></a>
					</form>
					<form method="post" action="/admin/delete-test-form">
							<a><button class="btn delete" type="submit" name="button"><i class="far fa-trash"></i>Supprimer un test</button></a>
					</form>
				</div>

				<div class="btn-box">
					<form method="post" action="/admin/associate-form">
							<a><button class="btn edit" type="submit" name="button"><i class="far fa-link"></i>Associer un module à un test</button></a>
					</form>
				</div>

				<div class="btn-box right">
					<form method="post" action="/admin/add-module-form">
							<a><button class="btn add" type="submit" name="button"><i class="fal fa-tachometer-alt-fastest"></i>Ajouter un module</button></a>
					</form>
					<form method="post" action="/admin/delete-module-form">
							<a><button class="btn delete" type="submit" name="button"><i class="far fa-trash"></i>Supprimer un module</button></a>
					</form>
				</div>

			</div>
		</div>

	</div>


	<div class="users line">

		<div class="">
					<div class="title">
							<h1>Foire aux questions</h1>
					</div>
			<div class="action">
				<form class="search-bar" method="post">
									<a href="/admin/edit-faq"><button class="btn edit" type="button" name="button"><i class="fal fa-edit"></i>Modifier</button></a>
				</form>
			</div>
		</div>

		<div class="">
					<div class="title">
							<h1>Forum</h1>
					</div>
			<div class="action">
							<form method="post" action="/forum/add-tag-form">
								<button type="submit" class="btn add"><i class="fal fa-plus-square"></i>Ajouter une catégorie</button>
							</form>
			</div>
		</div>

	</div>


</div>
