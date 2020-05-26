<?php $this->title = "Contact"; ?>
    <link rel="stylesheet" href="/Web/css/form.css">
    <link rel="stylesheet" href="/Web/css/contact.css">

<div id="body">

    <div class="form-contact box">

          <h1>Contact</h1>
          <p class="top-text">N’hésitez pas à nous <span>solliciter</span> au travers du questionnaire suivant pour toute question ou demande d’information.<br>
          Nous nous engageons à traiter votre demande <span>dans les meilleurs délais.</span></p>

          <form method="post">

                <label>Sujet</label>
                <div class="selectbox">
                  <select name="subject">
                    <option value="">Choisir un sujet</option>
                    <option value="commercial">Offre commerciale</option>
                    <option value="issue">Problème technique</option>
                    <option value="divers">Divers</option>
                  </select>
                </div>
                <p class="error-msg"><?php if(isset($data[1]['error_subject'])) { echo $data[1]['error_subject']; } ?></p>


            <div class="message">

              <label>Message</label>
              <textarea name="message" rows="3" placeholder="Ecrivez votre message ici"></textarea>
              <p class="error-msg"><?php if(isset($data[1]['error_message'])) { echo $data[1]['error_message']; } ?></p>

            </div>

            <input type="submit" name="send" value="Envoyer">

          </form>

        </div>

</div>
