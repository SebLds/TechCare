<?php
$NombreTotalTests=0;
$Score= [0,0] ;
var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="fr">
    <head><title>Dashboard</title>
        <link rel="stylesheet" type="text/css" href="../../Web/css/dashboardPatient.css">
            <link href="../../Web/css/rulesConnected.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900&display=swap" rel="stylesheet">
        <meta charset="utf-8" />
    </head>


    <body>
    <div class="page">

        <form>
            <div class="searchBarre">
                <input type="search" id="maRecherche" name="research" placeholder="Rechercher une information sur les résultats..." required >
                <button>Rechercher</button>
            </div>
        </form>

        <div class="title">
            <h1>Mon tableau de bord personnalisé</h1>
        </div>

        <div class="welcomeMessage">
            <h2>Mes derniers tests</h2>
            <p> x tests disponibles </p>
            <button>Demande de test ?</button> <!-- Renvoyer l'utilisateur vers la page de contact -->
        </div>

        <div class="testResume">
            <div class="testResumeID">
                <p> <span>Score : 0</span> </p>
                <p> Type de test : </p>
                <button> Commentaire médecin</button>
            </div>

            <div class="testResumeID">
                <p> <span>Score : 0</span> </p>
                <p> Type de test : </p>
                <button> Commentaire médecin </button>
            </div>

            <div class="testResumeID">
                <p> <span>Score : 0</span> </p>
                <p> Type de test : </p>
                <button> Commentaire médecin </button>
            </div>

            <div class="testResumeID">
                <p> <span>Score : 0</span> </p>
                <p> Type de test : </p>
                <button> Commentaire médecin </button>
            </div>

            <div class="testResumeID">
                <p> <span>Score : 0</span> </p>
                <p> Type de test : </p>
                <button> Commentaire médecin </button>
            </div>

        </div>


    </div>
    </body>


</html>
