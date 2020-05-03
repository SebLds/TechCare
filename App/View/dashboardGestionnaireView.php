<?php
$NombreTotalTests=0;
$Score= [0,0] ;
?>

<!DOCTYPE html>
<html lang="fr">
<head><title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="dashboardGestionnaireCSS.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900&display=swap" rel="stylesheet">
    <meta charset="utf-8" />
</head>


<body>
<div class="page">

    <form>
        <div class="searchBarre">
            <input type="search" id="maRecherche" name="research" placeholder="Rechercher un test par : date, patient, score, type..." required >
            <button>Rechercher</button>
        </div>
    </form>

    <div class="title">
        <h1>Tableau de bord - [Gestionnaire]</h1>
    </div>

    <div class="welcomeMessage">
        <h2>Derniers tests clients</h2>
        <p> x patients testés</p>
        <button>Un problème ?</button> <!-- Renvoyer le gestionnaire vers la page de contact administrateur -->
    </div>

    <div class="testResume">
        <div class="testResumeID">
            <p>Date du test</p>
            <p>Nom du client</p>
            <p><span>Score : 0</span></p>
            <p> Type de test : </p>
            <button><span>+ </span>Ajouter commentaire</button>
        </div>

        <div class="testResumeID">
            <p>Date du test</p>
            <p>Nom du client</p>
            <p><span>Score : 0</span></p>
            <p> Type de test : </p>
            <button><span>+ </span>Ajouter commentaire</button>
        </div>

        <div class="testResumeID">
            <p>Date du test</p>
            <p>Nom du client</p>
            <p><span>Score : 0</span></p>
            <p> Type de test : </p>
            <button><span>+ </span>Ajouter commentaire</button>
        </div>

        <div class="testResumeID">
            <p>Date du test</p>
            <p>Nom du client</p>
            <p><span>Score : 0</span></p>
            <p> Type de test : </p>
            <button><span>+ </span>Ajouter commentaire</button>
        </div>

        <div class="testResumeID">
            <p>Date du test</p>
            <p>Nom du client</p>
            <p><span>Score : 0</span></p>
            <p> Type de test : </p>
            <button><span>+ </span>Ajouter commentaire</button>
        </div>


    </div>


</div>
</body>


</html>