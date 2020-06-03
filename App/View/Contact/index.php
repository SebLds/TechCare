<?php $this->title = "Contact"; ?>
    <link rel="stylesheet" href="/Web/css/form.css">
    <link rel="stylesheet" href="/Web/css/contact.css">

<div id="body">

    <div class="form-contact box">

          <h1>Contact</h1>
          <p class="top-text">N’hésitez pas à nous <span>solliciter</span> au travers du questionnaire suivant pour toute question ou demande d’information.<br>
          Nous nous engageons à traiter votre demande <span>dans les meilleurs délais.</span></p>

          <?php if (isset($data['msg-validate'])): ?>
            <div class="msg">
                <p class="send-msg"><i class="far fa-paper-plane"></i>Votre message a bien été envoyé ! Merci de nous avoir contacté.</p>
            </div>
          <?php endif; ?>

          <form method="post">

            <div class="personnal-info">

              <div class="left">

                <label><i class="far fa-user-tag"></i>Nom</label>
                <input type="text" name="lastName" placeholder="Romuald" value="<?php if(isset($data[0]['firstName'])) { echo $data[0]['firstName']; }?>">
                <p class="error-msg"><?php if(isset($data[1]['error_firstName'])) { echo $data[1]['error_firstName']; } ?></p>


                <label><i class="far fa-user"></i>Prénom</label>
                <input type="text" name="firstName" placeholder="Monteiro">
                <p class="error-msg"><?php if(isset($data[1]['error_lastName'])) { echo $data[1]['error_lastName']; } ?></p>


              </div>

              <div class="center">

                <label><i class="far fa-building"></i>Société / Institution</label>
                <input class="inputright" type="text" name="company" placeholder="Hôpital Necker">
                <p class="error-msg"><?php if(isset($data[1]['error_company'])) { echo $data[1]['error_company']; } ?></p>


                <label><i class="far fa-envelope"></i>Adresse email</label>
                <input class="inputright" type="text" name="mail" placeholder="infinite@measures.com">
                <p class="error-msg"><?php if(isset($data[1]['error_mail'])) { echo $data[1]['error_mail']; } ?></p>


              </div>

              <div class="right">

                <label><i class="far fa-question-circle"></i>Sujet</label>
                <div class="selectbox">
                  <select name="subject">
                    <option value="">Choisir un sujet</option>
                    <option value="commercial">Offre commerciale</option>
                    <option value="issue">Problème technique</option>
                    <option value="divers">Divers</option>
                  </select>
                </div>
                <p class="error-msg"><?php if(isset($data[1]['error_subject'])) { echo $data[1]['error_subject']; } ?></p>


              </div>

            </div>

            <div class="message">

              <label><i class="far fa-comment-alt"></i>Message</label>
              <textarea name="message" rows="3" placeholder="Ecrivez votre message ici"></textarea>
              <p class="error-msg"><?php if(isset($data[1]['error_message'])) { echo $data[1]['error_message']; } ?></p>

            </div>

            <input type="submit" name="send" value="Envoyer">

          </form>

        </div>

</div>
