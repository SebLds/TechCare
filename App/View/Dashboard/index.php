<?php
$NombreTotalTests=0;
$Score= [0,0] ;
?>

<?php $this->title='Dashboard';?>
<link href="/Web/css/dashboard.css" rel="stylesheet" type="text/css">

<div id="body">
    <h2>Dashboard</h2>
    <input type="text" autocomplete="off" class="search-input" placeholder="Rechercher des tests...">

    <div id="testResume">
        <ul class="testResumeID title">
            <li>Type</li>
            <li>Date</li>
            <li>Score</li>
            <li><div class="content"></div></li>
        </ul>

        <ul class="testResumeID">
            <li>Cognitif</li>
            <li>08/05/2020</li>
            <li>100/100</li>
            <li class="btn"><button>Commentaire médecin</button></li>
            <div class="comment">This is foo</div>
        </ul>

        <ul class="testResumeID">
            <li>Cognitif</li>
            <li>08/05/2020</li>
            <li>100/100</li>
            <li><button class="btn">Commentaire médecin</button></li>
        </ul>
        <div class="comment">This is foo</div>

        <ul class="testResumeID">
            <li>Cognitif</li>
            <li>08/05/2020</li>
            <li>100/100</li>
            <li><button class="btn">Commentaire médecin</button></li>
        </ul>
        <div class="comment">This is foo</div>

        <ul class="testResumeID">
            <li>Cognitif</li>
            <li>08/05/2020</li>
            <li>100/100</li>
            <li><button class="btn">Commentaire médecin</button></li>
        </ul>
        <div class="comment">This is foo</div>

    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="/Web/js/dashboard.js" ></script>