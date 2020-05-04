<?php

function checkConnexion($mail, $password) {
    return executeRequest('SELECT idUtilisateur, "Type" FROM utilisateur WHERE Email = ? AND Motdepasse = ?', $mail, $password);
} //function checkConnexion($mail, $password)


