<?php $this->title='Dashboard'; ?>

<link href="/Web/css/dashboard.css" rel="stylesheet" type="text/css">
<!--<link href="/Web/css/searchBar.css" rel="stylesheet" type="text/css">-->

<div id="body">

    <?php if($_SESSION['sessionStatus']==2) : ?>
        <form method="post" class="search-bar" action="/dashboard/result">
            <button class="sub-none" type="submit"><i class="fas fa-search fa-2x icon"></i></button>
            <input type="text" autocomplete="off" class="search-input" placeholder="Rechercher un patient..." name="search">
        </form>
    <?php endif; ?>

<?php if (isset($data)):?>

        <div class="table">
          <table>
            <thead>
              <th><i class="fal fa-notes-medical"></i></th>
              <th><i class="fal fa-calendar-alt"></i></th>
              <th><i class="fal fa-signal"></i></th>
              <th><i class="fal fa-id-card"></i></th>
              <th><i class="fal fa-id-card"></i></th>
              <th><i class="fal fa-id-card"></i></th>
              <th><i class="far fa-comment-dots"></i></th>
            </thead>

            <?php for ($i=0;$i<count($data['User_test']);$i++):?>
                   <div class="result">
                     <tr>
                         <td><?php $type = $data['User_test'][$i]->type; echo $type;?></td>
                         <td><?php $profil = $data['User_test'][$i]->profil; echo $profil;?></td>
                         <td><?php $score = $data['User_test'][$i]->score; echo $score;?>/100</td>
                         <td><?php $passDate = $data['User_test'][$i]->passDate; echo substr($passDate, 0, 10);?></td>
                         <td><?php echo $data['profil'][$i]['firstName']; ?></td>
                         <td><?php echo $data['profil'][$i]['lastName']; ?></td>
                         <td class="content"><?php $comment = $data['User_test'][$i]->comment; echo $comment;?></td>
                     </tr>
                   </div>
                  <?php endfor; ?>
         </table>
        </div>
    <!-- </div> -->
</div>

<script>
    $('button').css('height')
</script>

<?php else : ?>

  <h1>Vous n'avez effectué aucun test</h1>

<?php endif; ?>
