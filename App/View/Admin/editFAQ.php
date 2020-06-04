<?php $this->title = "Modifier FAQ"; ?>
<link href="/Web/css/form.css" rel="stylesheet">
<link href="/Web/css/button.css" rel="stylesheet">

<div id="body">
  <div class="form-register box">

    <h1 id="faq-title">Modifier la FAQ</h1>

    <form id="add-from" method="post">

      <label><i class="fal fa-question-circle"></i>Question</label>
      <input type="text" name="newQuestion" value="">

      <label><i class="fal fa-info-circle" style="margin-top: 1em"></i>Réponse</label>
      <textarea name="newAnswer" rows="3" cols="80" value=""></textarea>
      <p id="form-add" class="error-msg"><?php if(isset($data['error'])) { echo $data['error']; }?></p>

      <button id="add-submit" type="submit" name="add" style="margin-top: 0" class="btn add"><i class="fal fa-plus-square"></i>Ajouter</button>

    </form>

    <?php for ($i=0;$i<count($data['faq']);$i++):?>
    <form method="post">

      <label><i class="fal fa-question-circle"></i>Question</label>
      <input type="text" name="question" value="<?php $question = $data['faq'][$i]->question; echo $question; ?>">

      <label style="margin-top: 1em"><i class="fal fa-info-circle"></i>Réponse</label>
      <textarea name="answer" rows="3" cols="80" value=""><?php $answer = $data['faq'][$i]->answer; echo $answer; ?></textarea>
      <p class="validate-msg"><?php if(isset($data['validate'])) { echo $data['validate']; }?></p>

      <div class="faq">
        <button type="submit" name="modify" class="btn edit"><i class="fal fa-edit"></i>Modifier</button>
        <button type="submit" class="btn delete" name="delete"><i class="fal fa-trash"></i>Supprimer</button>
      </div>

    </form>
    <?php endfor; ?>

  </div>

</div>
