<?php $this->title = "Contact"; ?>
    <link rel="stylesheet" href="/Web/css/form.css">
    <link rel="stylesheet" href="/Web/css/contact.css">

<div id="body">

    <div class="form-contact box">

          <h1>Contact</h1>
          <p class="top-text">N’hésitez pas à nous <span>solliciter</span> au travers du questionnaire suivant pour toute question ou demande d’information.<br>
          Nous nous engageons à traiter votre demande <span>dans les meilleurs délais.</span></p>

          <form method="post">

            <div class="personnal-info">

              <div class="left">

                <label>Nom</label>
                <input type="text" name="lastName" placeholder="Romuald" value="<?php if(isset($data[0]['firstName'])) { echo $data[0]['firstName']; }?>">
                <p class="error-msg"><?php if(isset($data[1]['error_firstName'])) { echo $data[1]['error_firstName']; } ?></p>


                <label>Prénom</label>
                <input type="text" name="firstName" placeholder="Monteiro">
                <p class="error-msg"><?php if(isset($data[1]['error_lastName'])) { echo $data[1]['error_lastName']; } ?></p>


              </div>

              <div class="center">

                <label>Société / Institution</label>
                <input class="inputright" type="text" name="company" placeholder="Hôpital Necker">
                <p class="error-msg"><?php if(isset($data[1]['error_company'])) { echo $data[1]['error_company']; } ?></p>


                <label>Adresse email</label>
                <input class="inputright" type="text" name="mail" placeholder="infinite@measures.com">
                <p class="error-msg"><?php if(isset($data[1]['error_mail'])) { echo $data[1]['error_mail']; } ?></p>


              </div>

              <div class="right">

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


              </div>

            </div>

            <div class="message">

              <label>Message</label>
              <textarea name="message" rows="3" placeholder="Ecrivez votre message ici"></textarea>
              <p class="error-msg"><?php if(isset($data[1]['error_message'])) { echo $data[1]['error_message']; } ?></p>

            </div>

            <input type="submit" name="send" value="Envoyer">

          </form>

        </div>

</div>
