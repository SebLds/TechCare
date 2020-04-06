<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    // Connexion à la BDD
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

$reponse = $bdd->query('SELECT * FROM nom_table'); // On récupère toute la table
$donnees = $reponse->fetch(); // On récupère que la première ligne de la table
$donnees['nom_du_champ'];
$reponse->closeCursor(); // Termine le traitement de la requête
$reponse2 = $bdd->query(SELECT * FROM nom_table WHERE champ=''); // On récupère toutes les lignes de table
                                                                            // lorsque le champ est respecté
$reponse3 = $bdd->query(SELECT champ1, champ2, champ3 FROM nom_table WHERE champ=''
                                OR champ='' ORDER BY champ3 DESC LIMIT 0,10);
// On récupère les champs 1, 2 et 3 de la table lorsque champ='' ou '' ordonné par ordre décroissant de la valeur 0 jusqu'à +10

$req = $bdd->prepare('SELECT champ1, champ2 FROM nom_table WHERE champ = :champ AND champ3 <= :champ3');
$req->execute(array('champ' => $_GET['champ'], 'champ3' => $_GET['champ3']));
// Requête préparée permet d'éviter les injections SQL


$req = $bdd->prepare('INSERT INTO jeux_video(nom, possesseur, console, prix, nbre_joueurs_max, commentaires)
 VALUES(:nom, :possesseur, :console, :prix, :nbre_joueurs_max, :commentaires)');
$req->execute(array(
    'nom' => $nom,
    'possesseur' => $possesseur,
    'console' => $console,
    'prix' => $prix,
    'nbre_joueurs_max' => $nbre_joueurs_max,
    'commentaires' => $commentaires
));

$req = $bdd->prepare('UPDATE jeux_video SET prix = :nvprix, nbre_joueurs_max = :nv_nb_joueurs WHERE nom = :nom_jeu');
$req->execute(array(
    'nvprix' => $nvprix,
    'nv_nb_joueurs' => $nv_nb_joueurs,
    'nom_jeu' => $nom_jeu
));

$req = $bdd->prepare(DELETE FROM jeux_video WHERE nom='Battlefield 1942');
$req->execute(array('nom' => $nom));

// fonctions scalaires utiles : UPPER LOWER LENGTH ROUND
// fonctions d'agrégat : AVG, SUM, MAX, MIN, COUNT
// GROUP BY utile pour fonction permet de groupé pour un champ donné
// HAVING pour filtrer après groupement

//DATE : stocke une date au format AAAA-MM-JJ (Année-Mois-Jour) ;
//TIME : stocke un moment au format HH:MM:SS (Heures:Minutes:Secondes) ;
//DATETIME : stocke la combinaison d'une date et d'un moment de la journée au format AAAA-MM-JJ HH:MM:SS.
//TIMESTAMP : stocke le nombre de secondes passées depuis le 1er janvier 1970 à 00 h 00 min 00 s ;
//YEAR : stocke une année, soit au format AA, soit au format AAAA.
// BETWEEN pour récupérer des données entre deux dates
// NOW() : date au moment donnée
// DAY(),MONTH(),YEAR(), HOUR(),MINUTE() et SECOND() : extraire le champ voulu d'une date
// DATE_FORMAT() : permet de formater une date au format voulu
// DATE_ADD, DATE_SUB : permet pour une date donnée de soustraire ou ajounter une valeur à un champ 7
// ex : DATE_ADD(date, INTERVAL 15 DAY)
?>
