<link href="/Web/css/form.css" rel="stylesheet">
<link href="/Web/css/button.css" rel="stylesheet">

<div id="body">

    <form method="post" action="/forum/add-thread">

        <div class="form-add-category box">

            <h1>Ajouter un sujet</h1>
            <p class="top-text">Ajouter un nouveau sujet à la catégorie : <?php if(isset($data)){echo $data['tagTitle'];}?></p>
            <input type="hidden" name="tagTitle" value="<?php echo $data['tagTitle']; ?>">
            <label><i class="fal fa-tags"></i>Sujet</label>
            <input type="text" name="newThread">
            <p class="error-msg"></p>

            <label><i class="fal fa-comment-dots"></i>Premier message du sujet</label>
            <textarea name="reply" placeholder="Écrivez votre message ici"></textarea>
            <p class="error-msg"></p>

            <input type="submit" name="add" value="Ajouter">

        </div>

    </form>

</div>
