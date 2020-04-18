<?php

session_start();

// Vérification que la variable $_POST contienne des informations
if (!empty($_POST)) {
  extract($_POST);
  echo'ok';

  // On se place dans le formumaire de connexion
  if (isset($_POST['ask'])) {

    $mail = (string) htmlspecialchars($mail);
    $password = (string) htmlspecialchars($password);

    // Vérification du mail
    if (!empty($mail)) {
      if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $error_mail = ("L'adresse email est invalide");
      }
    } else {
      $error_mail = ("Veuillez renseigner votre mail");
    }

  }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Mot de passe oublié</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/Web/css/form.css">
    <link rel="stylesheet" href="/Web/css/connexion.css">
    <link rel="shortcut icon" type="image/png" href="/Web/images/favicon.png"/>
</head>

  <body>

    <div class="page">

      <div class="logo">
        <a href="home.php"><img id="logo" src="/Web/images/logo.png" alt="logo"></a>
      </div>

      <div class="box">

        <div class="title">
          <h1>Mot de passe oublié</h1>
          <span>Renseignez l'adresse email</span> de votre compte, nous vous enverrons un lien <br> pour que vous puissiez
          <span>choisir <br> un nouveau mot de passe</span>
        </div>

        <div class="form">
          <form method="post">
            <label>Adresse email</label>
            <input type="text" name="mail"  placeholder="infinite@measures.com">
            <p><?php if(isset($error_mail)) { echo $error_mail; } ?></p>
          </form>
          <input type="submit" name="ask" value="Je réinitialise
le mot de passe">
        </div>

       </div>

     </div>

  </body>

</html>
