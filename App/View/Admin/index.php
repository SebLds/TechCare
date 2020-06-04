<?php $this->title = "Dashboard"; ?>

<link href="/Web/css/dashboardAdmin.css" rel="stylesheet">
<link href="/Web/css/button.css" rel="stylesheet">

<div id="body">

	<div class="users">
        <div class="title">
            <h1>Utilisateurs</h1>
        </div>
		<div class="action">
			<form class="search-bar" method="post" action="/admin/dashboard/result">
                <a href="/admin/add-user"><button class="btn add" type="submit" name="button"><i class="fal fa-user-plus"></i>Ajouter</button></a>
                <button class="sub-none" type="submit"><i class="fal fa-search fa-2x icon"></i></button>
                <input type="text" autocomplete="off" class="search-input" name='search' placeholder="Rechercher des utilisateurs...">
            </form>
		</div>
	</div>

	<div class="users">
        <div class="title">
            <h1>Foire aux questions</h1>
        </div>
		<div class="action">
			<form class="search-bar" method="post">
                <a href="/admin/edit-faq"><button class="btn edit" type="submit" name="button"><i class="fal fa-edit"></i>Modifier</button></a>
                <button class="sub-none" type="submit"><i class="fal fa-search fa-2x icon"></i></button>
                <input type="text" autocomplete="off" class="search-input" placeholder="Rechercher des utilisateurs...">
            </form>
		</div>
	</div>

	<div class="users">
        <div class="title">
            <h1>Forum</h1>
        </div>
		<div class="action">
            <form>
			    <a href="/forum/add-tag"><button class="btn add" type="submit" name="button"><i class="fal fa-folder-plus"></i>Ajouter une catégorie</button></a>
            </form>
            <form>
			    <a href="/forum/add-thread"><button class="btn add" type="submit" name="button"><i class="fal fa-tags"></i>Ajouter un sujet</button></a>
            </form>
		</div>
	</div>

	<div class="users">
        <div class="title">
            <h1>Test</h1>
        </div>
		<div class="action">
            <form method="post" action="/admin/add-test-form">
                <a><button class="btn add" type="submit" name="button"><i class="fal fa-tachometer-alt-fastest"></i>Ajouter un type de test</button></a>
            </form>
						<form method="post" action="/admin/add-module-form">
                <a><button class="btn add" type="submit" name="button"><i class="fal fa-tachometer-alt-fastest"></i>Ajouter un module</button></a>
            </form>
            <form method="post" action="/admin/delete-test-form">
                <a><button class="btn add" type="submit" name="button"><i class="fal fa-tags"></i>Supprimer un test</button></a>
            </form>
						<form method="post" action="/admin/delete-module-form">
                <a><button class="btn add" type="submit" name="button"><i class="fal fa-tags"></i>Supprimer un module</button></a>
            </form>
						<form method="post" action="/admin/associate-form">
                <a><button class="btn add" type="submit" name="button"><i class="far fa-link"></i>Associer un module à un test</button></a>
            </form>
		</div>
	</div>


</div>
