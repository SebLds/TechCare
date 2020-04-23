<?php

function getIdentity($idUser)
{
    return executeRequest('SELECT Nom, Prenom FROM utilisateur WHERE idUtilisateur = ?', $idUser);
} //function getIdentity($idUser)


function getCompleteProfil($idUser)
{
    return executeRequest('SELECT * FROM utilisateur WHERE idUtilisateur = ?', $idUser);
} //function getComplete($idUser)


function getModifyProfil($idUser, $mail, $password, $name, $surname, $address, $type, $tel)
{
    $db = getBDD();
    $req = $db->prepare('UPDATE utilisateur SET Email = ?, Motdepasse = ?, Prenom = ?, Nom = ?, Adresse = ?, "Type" = ?, Tel = ? WHERE idUtilisateur = ?'.$idUser);
    $req->execute(array($mail, $password, $name, $surname, $address, $type, $tel));
    $modify = $req->fetch();
    return $modify;
} //function getModifyProfil($idUser, $mail, $password, $name, $surname, $address, $type, $tel)


function getSpecificTest($idUser)
{
    return executeRequest('SELECT * FROM test WHERE idUtilisateur = ? AND (NumeroSecu = ? OR idProfil = ? OR Examinateur = ? OR "Type" = ? OR Score = ?)', $idUser);
} //function getSpecificTest($idUser)