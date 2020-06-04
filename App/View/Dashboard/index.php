<?php $this->title='Tableau de bord'; ?>


<link rel="stylesheet" type="text/css" href="/Web/css/dashboard.css">
<link rel="stylesheet" type="text/css" href="/Web/css/table.css">
<!--<link href="/Web/css/searchBar.css" rel="stylesheet" type="text/css">-->

<div id="body">
    <?php if($_SESSION['sessionStatus']==1) : ?>
        <form method="post" class="search-bar">
            <button class="sub-none" type="submit"><i class="fal fa-search fa-2x icon"></i></button>
            <input type="text" autocomplete="off" class="search-input" placeholder="Rechercher un test..." name="search">
        </form>
    <?php endif; ?>

    <?php if($_SESSION['sessionStatus']==2) : ?>
        <form method="post" class="search-bar" action="/dashboard/result">
            <button class="sub-none" type="submit"><i class="fal fa-search fa-2x icon"></i></button>
            <input type="text" autocomplete="off" class="search-input" placeholder="Rechercher un patient..." name="search">
        </form>
    <?php endif; ?>

    <?php if (isset($data)):?>
    <table class="rwd-table">
        <thead>
            <th><i class="fal fa-notes-medical"></i><span>&ensp;&ensp;Type de test</span></th>
            <th><i class="fal fa-calendar-alt"></i><span>&ensp;&ensp;Actvité physique</span></th>
            <th><i class="fal fa-signal"></i><span>&ensp;&ensp;Score</span></th>
            <th><i class="fal fa-id-card"></i><span>&ensp;&ensp;Date</span></th>
            <th><i class="far fa-comment-dots"></i><span>&ensp;&ensp;Commentaire</span></th>
        </thead>
        <?php for ($i=0;$i<count($data['User_test']);$i++):?>
        <tr>
            <td data-th="Type de test">
                <?php $type = $data['User_test'][$i]->type; ?>
                <?php if ($type == 'stress'): ?>
                <i class="fal fa-heart-rate"></i>&ensp;&ensp;Gestion du stress</td>
                <?php endif; ?>
                <?php if ($type == 'sight'): ?>
                <i class="fal fa-low-vision"></i>&ensp;&ensp;Acuité visuelle
                <?php endif; ?>
                <?php if ($type == 'sound'): ?>
                <i class="fal fa-waveform"></i>&ensp;&ensp;Acuité sonore
                <?php endif; ?></td>
            </td>
            <td data-th="Actvité physique"><?php $profil = $data['User_test'][$i]->profil; echo $profil;?></td>
            <td data-th="Score"><?php $score = $data['User_test'][$i]->score; echo $score;?>/100</td>
            <td data-th="Date"><?php $passDate = $data['User_test'][$i]->passDate; echo substr($passDate, 0, 10);?></td>
            <td data-th="Commentaire"><?php $comment = $data['User_test'][$i]->comment; echo $comment;?></td>
            <?php endfor; ?>
        </tr>
    </table>
</div>



<?php else : ?>
  <h1>Vous n'avez effectué aucun test</h1>
<?php endif; ?>
