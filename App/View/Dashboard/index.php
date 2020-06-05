<?php $this->title='Tableau de bord'; ?>


<link rel="stylesheet" type="text/css" href="/Web/css/dashboard.css">
<link rel="stylesheet" type="text/css" href="/Web/css/table.css">

<div id="body">

    <?php if($_SESSION['sessionStatus']==2) : ?>
        <form method="post" class="search-bar" action="/dashboard/result">
            <button class="sub-none" type="submit"><i class="fal fa-search fa-2x icon"></i></button>
            <input type="text" autocomplete="off" class="search-input" placeholder="Rechercher un patient..." name="search">
        </form>
    <?php endif; ?>


    <?php if (isset($data)):?>

    <table class="rwd-table">
        <thead>
          <?php if($_SESSION['sessionStatus']==2): ?>
            <th><i class="fal fa-user"></i><span>&ensp;&ensp;Prénom</span></th>
            <th><i class="fal fa-user"></i><span>&ensp;&ensp;Nom</span></th>
          <?php endif; ?>
            <th><i class="fal fa-notes-medical"></i><span>&ensp;&ensp;Type de test</span></th>
            <th><i class="fal fa-calendar-alt"></i><span>&ensp;&ensp;Activité physique</span></th>
            <th><i class="fal fa-signal"></i><span>&ensp;&ensp;Score</span></th>
            <th><i class="fal fa-id-card"></i><span>&ensp;&ensp;Date</span></th>
            <th><i class="far fa-comment-dots"></i><span>&ensp;&ensp;Commentaire</span></th>
        </thead>
        <?php for ($i=0;$i<count($data['User_test']);$i++):?>
        <tr>
            <?php if($_SESSION['sessionStatus']==2): ?>
            <td data-th="Prénom"><?php $name = $data['profil'][$i]['firstName']; echo $name;?></td>
            <td data-th="Nom"><?php $lastName = $data['profil'][$i]['lastName']; echo $lastName;?></td>
            <?php endif; ?>
            <td data-th="Type de test">
                <?php $type = $data['User_test'][$i]->type; echo $type; ?>
            </td>
            <td data-th="Actvité physique">
              <?php $profil = $data['User_test'][$i]->profil; ?>
              <?php if ($profil=='Sportsman'): ?>
                Sportif
              <?php endif; ?>
              <?php if ($profil=='Active'): ?>
                Actif
              <?php endif; ?>
              <?php if ($profil=='Sedentary'): ?>
                Sédentaire
              <?php endif; ?>
            </td>
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
