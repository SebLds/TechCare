<?php

function getCountTotalTestsUser($idUser)
{
    return executeRequest('SELECT count(idPretest) as nbTests FROM test WHERE idUtilisateur = ?', $idUser);
} //function getCountTotalTestsUser($id)


function getLastScore($idUser, $value) //Voir avec $value pour faire -1 lorsque l'on veut l'AVANT-dernier test, etc..
{
    return executeRequest("SELECT Score FROM test WHERE (idUtilisateur = ? AND idPretest = MAX(idPretest)-$value", $idUser);
} //function getLastScore($idUser, $value)


function getLastTypeTest($idUser, $value) //Récupérer le type du dernier test seulement
{
    return executeRequest("SELECT Type as typeTest FROM test WHERE (idUtilisateur = ? AND idPretest = MAX(idPretest)-$value", $idUser);
} //function getLastTypeTest($idUser, $value)


function getLastCommentaire($idUser, $value) //Récupérer le commentaire du dernier test
{
    return executeRequest("SELECT commentaire FROM test WHERE (idUtilisateur = ? AND idPretest = MAX(idPretest)-$value", $idUser);
} //function getLastCommentaire($idUser, $value)



//$result = $req->fetch(PDO::FETCH_ASSOC);
//$nbTotalTests = $result['nbTests'];
