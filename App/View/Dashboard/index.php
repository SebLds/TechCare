<?php
$NombreTotalTests=0;
$Score= [0,0] ;
?>

<?php $this->title='Dashboard';?>
<link href="/Web/css/dashboard.css" rel="stylesheet" type="text/css">

<div id="body">
    <h2>Dashboard</h2>

    <!--
    <div class="title">
        <p>Mes derniers tests</p>
        <p> x tests disponibles</p>
        <form action="/homepage" method="get">
            <button type="submit">Demande de test ?</button>
        </form>
    </div>
-->
    <div class="testResume">
        <ul class="testResumeID title">
            <li>Search Bar</li>
            <li>Status</li>
            <li>Date</li>
            <li>Score</li>
            <li><div class="content"></div></li>
        </ul>

        <ul class="testResumeID">
            <li>Cognitif</li>
            <li class="status">Passé</li>
            <li>08/05/2020</li>
            <li>100/100</li>
            <li><button>Commentaire médecin</button></li>
        </ul>

        <ul class="testResumeID">
            <li>Cognitif</li>
            <li class="status">Passé</li>
            <li>08/05/2020</li>
            <li>100/100</li>
            <li><button>Commentaire médecin</button></li>
        </ul>

        <ul class="testResumeID">
            <li>Cognitif</li>
            <li class="status">Passé</li>
            <li>08/05/2020</li>
            <li>100/100</li>
            <li><button>Commentaire médecin</button></li>
        </ul>

        <ul class="testResumeID">
            <li>Cognitif</li>
            <li class="status">Passé</li>
            <li>08/05/2020</li>
            <li>100/100</li>
            <li><button>Commentaire médecin</button></li>
        </ul>
    </div>
</div>

<script>
    $('button').css('height')
</script>