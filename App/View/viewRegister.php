<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../register.css" rel="stylesheet">
    <link href="../form.css" rel="stylesheet">
    <link href="../rules.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
    <title>Inscription</title>
  </head>
  <body>

    <div class="page">

      <!--
      <div class="logo">
        <a href="home.phpdex.php"><img id="logo" src="../images/logo.png" alt="logo"></a>
      </div>
    -->

      <div class="box">

        <div class="title">
          <h1>Je m'inscris à Infinite Measures</h1>
          <h3><a href="connexion.php">Ou je me connecte</h3></a>
        </div>

        <div class="form">

          <form method="post">

            <div class="fields">

              <div class="left">

                <label>Prénom</label>
                <input type="text" name="firstName" placeholder="Romuald" value="<?php if(isset($firstName)) { echo $firstName; }?>">
                <p><?php if(isset($error_firstName)) { echo $error_firstName; }?></p>

                <label>Date de naissance</label>

                <div class="birthdate">
                  <input class="date" id="day" maxlength="2" type="text" name="day" placeholder="JJ">
                  <input class="date" id="month" maxlength="2" type="text" name="month" placeholder="MM">
                  <input class="date" id="year" maxlength="4" type="text" name="year" placeholder="AAAA">
                </div>
                <p><?php if(isset($error_birthdate)) { echo $error_birthdate; }?></p>

                <label>Adresse email</label>
                <input type="text" name="mail" placeholder="infinite@measures.com" value="<?php if(isset($mail)) { echo $mail; }?>">
                <p><?php if(isset($error_mail)) { echo $error_mail; }?></p>
                <label>Confirmation adresse email</label>
                <input type="text" name="mailConfirm" placeholder="infinite@measures.com">
                <p><?php if(isset($error_mailConfirm)) { echo $error_mailConfirm; }?></p>

              </div>

              <div class="right">

                <label>Nom</label>
                <input type="text" name="lastName" placeholder="Monteiro" value="<?php if(isset($lastName)) { echo $lastName; }?>">
                <p><?php if(isset($error_lastName)) { echo $error_lastName; }?></p>
                <label>Médecin référent</label>
                <input type="text" name="doctor" placeholder="Dupont" value="<?php if(isset($doctor)) { echo $doctor; }?>">
                <p><?php if(isset($error_doctor)) { echo $error_doctor; }?></p>
                <label>Mot de passe</label>
                <input id="myInput" type="password" name="password" placeholder="●●●●●●●●" value="<?php if(isset($password)) { echo $password; }?>">
                <p><?php if(isset($error_password)) { echo $error_password; }?></p>
                 <!--<img id="eye" src="images/hide.png">-->
                <label>Confirmation du mot de passe</label>
                <input type="password" name="passwordConfirm" placeholder="●●●●●●●●">
                <p><?php if(isset($error_passwordConfirm)) { echo $error_passwordConfirm; }?></p>

              </div>

            </div>

            <div class="CGU">
              <input type="checkbox" name="check">
              <span>J'accepte et comprends les <a href="#">conditions générales d'utilisations</a></span>
            </div>
            <p class=CGU ><?php if(isset($error_cgu)) { echo $error_cgu; }?></p>

            <div class="submit">
              <input type="submit" value="Je m'inscris"  name="register">
            </div>

          </form>

       </div>

      </div>

    </div>

    <script type="text/javascript" src="password.js"></script>

  </body>
</html>
