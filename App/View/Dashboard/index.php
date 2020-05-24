<?php
$NombreTotalTests=0;
$Score= [0,0] ;
?>

<?php $this->title='Dashboard';?>
<link href="/Web/css/dashboard.css" rel="stylesheet" type="text/css">

<div id="body">
    <h2>Dashboard</h2>
    <input type="text" autocomplete="off" class="search-input" placeholder="Rechercher des réponses...">

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
            <li><button onclick="toggle_visibility();">Commentaire médecin</button></li>
        </ul>
        <div class="comment">This is foo</div>

        <ul class="testResumeID">
            <li>Cognitif</li>
            <li>08/05/2020</li>
            <li>100/100</li>
            <li><button>Commentaire médecin</button></li>
        </ul>

        <ul class="testResumeID">
            <li>Cognitif</li>
            <li>08/05/2020</li>
            <li>100/100</li>
            <li><button>Commentaire médecin</button></li>
        </ul>

        <ul class="testResumeID">
            <li>Cognitif</li>
            <li>08/05/2020</li>
            <li>100/100</li>
            <li><button>Commentaire médecin</button></li>
        </ul>
    </div>
</div>

<script type="text/javascript">
    function toggle_visibility() {
        var e = document.getElementById('testResume');
        e.classList.toggle("comment");
    }
</script>