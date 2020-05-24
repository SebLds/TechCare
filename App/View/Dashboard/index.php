<?php $this->title='Dashboard'; ?>

<link href="/Web/css/dashboard.css" rel="stylesheet" type="text/css">
<link href="/Web/css/searchBar.css" rel="stylesheet" type="text/css">

<div id="body">

    <h2>Dashboard</h2>

    <div class="searchBar">
      <?php if($_SESSION['sessionStatus']==1) : ?>
      <form method="post">
        <input type="text" autocomplete="off" class="search-input" placeholder="Rechercher un test..." tabindex="1" name="search">
      </form>
      <?php endif; ?>

      <?php if($_SESSION['sessionStatus']==2) : ?>
      <form method="post">
        <input type="text" autocomplete="off" class="search-input" placeholder="Rechercher un patient..." tabindex="1">
      </form>
      <?php endif; ?>
    </div>

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
            <li><i class="fal fa-notes-medical"></i></li>
            <li><i class="fal fa-calendar-alt"></i></li>
            <li><i class="fal fa-signal"></i></li>
            <li><i class="fal fa-id-card"></i></li>
            <li><i class="fal fa-user-md"></i></li>
            <li><div class="content"></div></li>
        </ul>

        <?php for ($i=0;$i<count($data['User_test']);$i++):?>
        <ul class="testResumeID">
            <li id="type">
              <?php $type = $data['User_test'][$i]->type; ?>
              <?php if ($type == 'stress'): ?>
               Gestion du stress
              <?php endif; ?>
              <?php if ($type == 'sight'): ?>
               Acuité visuelle
              <?php endif; ?>
              <?php if ($type == 'sound'): ?>
                Acuité sonore
              <?php endif; ?>
            </li>
            <li id="date"><?php $passDate = $data['User_test'][$i]->passDate; echo substr($passDate, 0, 10) ;?></li>
            <li ><?php $score = $data['User_test'][$i]->score; echo $score;?>/100</li>
            <li><?php $profil = $data['User_test'][$i]->profil; echo $profil;?></li>
            <li><button>Commentaire médecin</button></li>
        </ul>
        <?php endfor; ?>

        <table>
               <tr>
                   <th><i class="fal fa-notes-medical"></th>
                   <th><i class="fal fa-calendar-alt"></i</th>
                   <th><i class="fal fa-signal"></i></th>
                   <th><i class="fal fa-id-card"></i></th>
                   <th><i class="fal fa-user-md"></i></th>
               </tr>
               <?php for ($i=0;$i<count($data['User_test']);$i++):?>
               <tr>
                   <td>
                     <?php $type = $data['User_test'][$i]->type; ?>
                     <?php if ($type == 'stress'): ?>
                     Gestion du stress</td>
                     <?php endif; ?>
                     <?php if ($type == 'sight'): ?>
                     Acuité visuelle
                     <?php endif; ?>
                     <?php if ($type == 'sound'): ?>
                     Acuité sonore
                     <?php endif; ?>
                   </td>
                   <td><?php $passDate = $data['User_test'][$i]->passDate; echo substr($passDate, 0, 10) ;?></td>
                   <td><?php $score = $data['User_test'][$i]->score; echo $score;?>/100</td>
                   <td><?php $profil = $data['User_test'][$i]->profil; echo $profil;?></td>
                   <td><?php $comment = $data['User_test'][$i]->comment; echo $comment;?></td>
                   <?php endfor; ?>
               </tr>
       </table>

    </div>
</div>

<script>
    $('button').css('height')
</script>

<?php else : ?>

  <h1>Vous n'avez effectué aucun test</h1>

<?php endif; ?>
