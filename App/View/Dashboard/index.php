<?php $this->title='Dashboard'; ?>

<link href="/Web/css/dashboard.css" rel="stylesheet" type="text/css">



<div id="body">
    <h2>Dashboard</h2>

<?php if (isset($data)):?>
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

        <?php for ($i=0;$i<count($data['User_test']);$i++):?>
        <ul class="testResumeID">
            <li><?php $type = $data['User_test'][$i]->type; echo $type;?></li>
            <li><?php $passDate = $data['User_test'][$i]->passDate; echo substr($passDate, 0, 10) ;?></li>
            <li><?php $score = $data['User_test'][$i]->score; echo $score;?>/100</li>
            <li><button>Commentaire médecin</button></li>
            <li><?php $comment = $data['User_test'][$i]->comment; echo $comment;?></li>
        </ul>
        <?php endfor; ?>

    </div>
</div>

<script>
    $('button').css('height')
</script>

<?php else : ?>

  <h1>Vous n'avez effectué aucun test</h1>

<?php endif; ?>
