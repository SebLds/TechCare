<?php $this->title = "Contact" ?>
    <link rel="stylesheet" href="/Web/css/login.css">
    <link rel="stylesheet" href="/Web/css/form.css">
    <link rel="stylesheet" href="/Web/css/contact.css">

<div id="body">

    <div class="form-contact box">

          <h1>Contact</h1>
          N’hésitez pas à nous solliciter au travers du questionnaire suivant pour toute question ou demande d’information. <br>
          Nous nous engageons à traiter votre demande dans les meilleurs délais.

          <form>

            <div class="personnal-info">

              <div class="left">
                <label>Nom</label>
                <input type="text" name="lastName" placeholder="Romuald">
                <label>Prénom</label>
                <input type="text" name="firstName" placeholder="Monteiro">
              </div>

              <div class="right">
                <label>Société/Institution</label>
                <input class="inputright" type="text" name="company" placeholder="Hôpital Necker">
                <label>Adresse email</label>
                <input class="inputright" type="text" name="mail" placeholder="infinite@measures.com">
              </div>

            </div>

            <div class="content">

              <label>Sujet</label>
              <select class="" name="" name="subject" placeholder="">
                <option value="">Commerciale</option>
                <option value="">Technique</option>
                <option value="">Recrutement</option>
                <option value="">Relation presse</option>
                <option value="">Autre</option>
                </select>

              <label>Message</label>
              <textarea name="message" rows="10" placeholder="Ecrivez votre message ici"></textarea>

            </div>

            <input type="submit" name="send" value="Envoyer">

          </form>

        </div>

</div>
