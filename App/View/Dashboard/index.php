<?php
$NombreTotalTests=0;
$Score= [0,0] ;
?>

<?php $this->title='Dashboard';?>
<link href="/Web/css/dashboard.css" rel="stylesheet" type="text/css">

<div id="body">
    <div class="welcomeMessage">
        <div> <p>Mes derniers tests</p> </div>
        <div> <p> x tests disponibles </p> </div>
        <button>Demande de test ?</button> <!-- Renvoyer l'utilisateur vers la page de contact -->
    </div>

    <div class="testResume">
        <div class="testResumeID">
            <div><p><bold>Score : 0 > </bold> </p> </div>
            <div><p>Type de score</p></div>
            <button>Commentaire médecin</button>
        </div>

        <div class="testResumeID">
            <div> <p> <bold>Score : 0 > </bold> </p> </div>
            <div> <p> Type de score </p> </div>
            <button> Commentaire médecin </button>
        </div>

    </div>

</div>