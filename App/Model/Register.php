<?php

namespace App\Model;
use PDO;
use src\Config\ConfigException;
use src\Model;

class Register extends Model {

    public function checkConnexion($mail, $password) {
        try {
            return $this -> executeRequest('SELECT idUtilisateur, "Type" FROM utilisateur WHERE Email = ? AND Motdepasse = ?', $mail, $password) -> fetch(PDO::FETCH_OBJ);
        } catch (ConfigException $e) { return false; /*Message d'erreur*/ }
    } //function checkConnexion($mail, $password)
}
