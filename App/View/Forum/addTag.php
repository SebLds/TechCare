<link href="/Web/css/form.css" rel="stylesheet">
<link href="/Web/css/button.css" rel="stylesheet">

<div id="body">

	<form method="post" action="/forum/add-tag">

		<div class="form-add-category box">

			<h1>Ajouter une catégorie</h1>
			<p class="top-text">Ajouter une nouvelle catégorie au forum</p>

			<label><i class="fal fa-tags"></i>Catégorie</label>
			<input type="text" name="newTag">
			<p class="error-msg"></p>

			<label><i class="fal fa-comment-dots"></i>Description</label>
			<input type="text" name="description">
			<p class="error-msg"></p>

			<input type="submit" name="add" value="Ajouter">

		</div>

	</form>

</div>
