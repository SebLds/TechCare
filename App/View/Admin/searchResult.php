<?php $this->title='Tableau de bord'; ?>

<link href="/Web/css/dashboard.css" rel="stylesheet" type="text/css">
<link href="/Web/css/button.css" rel="stylesheet" type="text/css">
<link href="/Web/css/table.css" rel="stylesheet" type="text/css">

<div id="body">
    <?php if($_SESSION['sessionStatus']==3 AND isset($data)) : ?>
        <form method="post" class="search-bar" action="/admin/dashboard/result">
            <button class="sub-none" type="submit"><i class="fas fa-search fa-2x icon"></i></button>
            <input type="text" autocomplete="off" class="search-input" placeholder="Rechercher un utilisateur..." name="search">
        </form>

        <table class="rwd-table">
            <thead>
                <th><i class="fal fa-user"></i><span>&ensp;&ensp;Prénom</span></th>
                <th><i class="fal fa-user-tag"></i><span>&ensp;&ensp;Nom</span></th>
                <th><i class="fal fa-user-shield"></i><span>&ensp;&ensp;Type d'utilisateur</span></th>
                <th><i class="fal fa-calendar-alt"></i><span>&ensp;&ensp;Date</span></th>
                <th><i class="fal fa-envelope"></i><span>&ensp;&ensp;Mail</span></th>
                <th></th>
            </thead>
            <?php for ($i=0;$i<count($data['searchResult']);$i++):?>
                <tr>
                    <td data-th="Prénom"><?php $firstName = $data['searchResult'][$i]->firstName; echo $firstName;?></td>
                    <td data-th="Nom"><?php $lastName = $data['searchResult'][$i]->lastName; echo $lastName;?></td>
                    <td data-th="Type d'utilisateur">
                      <?php $status = $data['searchResult'][$i]->status;
                      if ($status==1): ?>
                      Patient
                      <?php endif; ?>
                      <?php $status = $data['searchResult'][$i]->status;
                      if ($status==2): ?>
                      Gestionnaire
                      <?php endif; ?>
                      <?php $status = $data['searchResult'][$i]->status;
                      if ($status==3): ?>
                      Administrateur
                      <?php endif; ?>
                    </td>
                    <td data-th="Date"><?php $birthdate = $data['searchResult'][$i]->birthdate; echo $birthdate;?></td>
                    <td data-th="Mail"><?php $mail = $data['searchResult'][$i]->mail; echo $mail;?></td>
                    <td><a href="/admin/dashboard/profil-<?php echo $data['searchResult'][$i]->ID_Users?>"><button class="btn edit"><i class="far fa-address-card" style="font-size:1em"></i>Voir profil</button></a></td>
                </tr>
            <?php endfor; ?>
        </table>
    <?php endif; ?>
</div>
