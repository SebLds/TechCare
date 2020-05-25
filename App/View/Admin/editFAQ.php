<?php $this->title = "Add User"; ?>

<link href="/Web/css/form.css" rel="stylesheet">

<div id="body">

  <div class="form-register box">

    <h1>Modifier la FAQ</h1>
    <p class="top-text">Ajouter, modifier ou supprimer des questions de la foire aux questions.</p>

    <form id="add-from" method="post">

      <label>Question</label>
      <input type="text" name="newQuestion" value="">

      <label>Réponse</label>
      <input type="text" name="newAnswer" value="">
      <p class="error-msg"><?php if(isset($data['error'])) { echo $data['error']; }?></p>

      <input type="submit" name="add" value="Ajouter">

    </form>

    <?php for ($i=0;$i<count($data['faq']);$i++):?>
    <form method="post">

      <label>Question</label>
      <input type="text" name="question" value="<?php $question = $data['faq'][$i]->question; echo $question; ?>">

      <label>Réponse</label>
      <input type="text" name="answer" value="<?php $answer = $data['faq'][$i]->answer; echo $answer; ?>">
      <p class="validate-msg"><?php if(isset($data['validate'])) { echo $data['validate']; }?></p>

      <div class="faq">
        <input type="submit" name="modify" value="Modifier">
        <input type="submit" name="delete" value="Supprimer">
      </div>

    </form>
    <?php endfor; ?>

  </div>

</div>
