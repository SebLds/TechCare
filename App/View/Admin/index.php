<?php $this->title = "Dashboard"; ?>

<link href="/Web/css/dashboardAdmin.css" rel="stylesheet">
<link href="/Web/css/button.css" rel="stylesheet">

<div id="body">

	<div class="users">
			<h1 class="title">Utilisateurs</h1>
		<div class="action">
			<a href="/admin/add-user"><button class="btn add" type="submit" name="button"><i class="far fa-user-plus"></i>Ajouter</button></a>
			<form class="search-bar" method="post">
          <button class="sub-none" type="submit"><i class="fas fa-search fa-2x icon"></i></button>
          <input type="text" autocomplete="off" class="search-input" name='search' placeholder="Rechercher des utilisateurs...">
      </form>
		</div>
	</div>

	<div class="users">
			<h1 class="title">Foire aux questions</h1>
		<div class="action">
			<a href="/admin/edit-faq"><button class="btn edit" type="submit" name="button"><i class="far fa-edit"></i>Modifier</button></a>
			<form class="search-bar" method="post">
          <button class="sub-none" type="submit"><i class="fas fa-search fa-2x icon"></i></button>
          <input type="text" autocomplete="off" class="search-input" placeholder="Rechercher des utilisateurs...">
      </form>
		</div>
	</div>

	<div class="users">
			<h1 class="title">Forum</h1>
		<div class="action">
			<a href="/forum/add-tag"><button class="btn add" type="submit" name="button">Ajouter une catégorie</button></a>
			<a href="/forum/add-thread"><button class="btn add" type="submit" name="button">Ajouter un sujet</button></a>
		</div>
	</div>

	<div class="users">
			<h1 class="title">Test</h1>
		<div class="action">
			<a href="/admin/edit-faq"><button class="btn add" type="submit" name="button">Ajouter une type de test</button></a>
			<a href="/admin/edit-faq"><button class="btn add" type="submit" name="button">Ajouter un sujet</button></a>
		</div>
	</div>


</div>
