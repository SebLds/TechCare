<?php $this->title = "Contact" ?>
    <link rel="stylesheet" href="/Web/css/form.css">
    <link rel="stylesheet" href="/Web/css/contact.css">

<div id="body">

    <div class="form-contact box">

          <h1>Contact</h1>
          <p class="top-text">N’hésitez pas à nous <span>solliciter</span> au travers du questionnaire suivant pour toute question ou demande d’information.<br>
          Nous nous engageons à traiter votre demande <span>dans les meilleurs délais.</span></p>

          <form>

            <div class="personnal-info">

              <div class="left">

                <label>Nom</label>
                <input type="text" name="lastName" placeholder="Romuald">
                <p class="error-msg"><?php if(isset($error_passwordConfirm)) { echo $error_passwordConfirm; }?></p>

                <label>Prénom</label>
                <input type="text" name="firstName" placeholder="Monteiro">
                <p class="error-msg"><?php if(isset($error_passwordConfirm)) { echo $error_passwordConfirm; }?></p>

              </div>

              <div class="center">

                <label>Société / Institution</label>
                <input class="inputright" type="text" name="company" placeholder="Hôpital Necker">
                <p class="error-msg"><?php if(isset($error_passwordConfirm)) { echo $error_passwordConfirm; }?></p>

                <label>Adresse email</label>
                <input class="inputright" type="text" name="mail" placeholder="infinite@measures.com">
                <p class="error-msg"><?php if(isset($error_passwordConfirm)) { echo $error_passwordConfirm; }?></p>

              </div>

              <div class="right">

                <label>Sujet</label>
                <select class="" name="" name="subject" placeholder="">
                  <option value="">Commerciale</option>
                  <option value="">Technique</option>
                  <option value="">Recrutement</option>
                  <option value="">Relation presse</option>
                  <option value="">Autre</option>
                </select>

                <label>Pièce jointe</label>
                <input type="file" name="" value="">

              </div>

            </div>

            <div class="message">

              <label>Message</label>
              <textarea name="message" rows="3" placeholder="Ecrivez votre message ici"></textarea>

            </div>

            <input type="submit" name="send" value="Envoyer">

          </form>

        </div>

</div>
