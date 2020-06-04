<?php $this->title='Tableau de bord'; ?>

<link href="/Web/css/dashboard.css" rel="stylesheet" type="text/css">
<link href="/Web/css/button.css" rel="stylesheet" type="text/css">
<!--<link href="/Web/css/searchBar.css" rel="stylesheet" type="text/css">-->

<div id="body">
    <?php if($_SESSION['sessionStatus']==3 AND isset($data)) : ?>
        <form method="post" class="search-bar" action="/admin/dashboard/result">
            <button class="sub-none" type="submit"><i class="fas fa-search fa-2x icon"></i></button>
            <input type="text" autocomplete="off" class="search-input" placeholder="Rechercher un utilisateur..." name="search">
        </form>
        <div class="table">
            <table>
                <thead>
                <th><i class="far fa-user"></i></th>
                <th><i class="far fa-user-tag"></i></th>
                <th><i class="far fa-user-shield"></i></th>
                <th><i class="far fa-calendar-alt"></i></th>
                <th><i class="far fa-envelope"></i></th>
                <th></th>
                </thead>

                <?php for ($i=0;$i<count($data['searchResult']);$i++):?>
                    <div class="result">

                        <tr>
                            <td class="content"><?php $firstName = $data['searchResult'][$i]->firstName; echo $firstName;?></td>
                            <td class="content"><?php $lastName = $data['searchResult'][$i]->lastName; echo $lastName;?></td>
                            <td class="content">
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
                            <td class="content"><?php $birthdate = $data['searchResult'][$i]->birthdate; echo $birthdate;?></td>
                            <td class="content"><?php $mail = $data['searchResult'][$i]->mail; echo $mail;?></td>
                            <td class="content"><a href="/admin/dashboard/profil-<?php echo $data['searchResult'][$i]->ID_Users?>"><button class="btn edit"><i class="far fa-address-card" style="font-size:1em"></i>Voir profil</button></a></td>
                        </tr>

                    </div>
                <?php endfor; ?>
            </table>
        </div>
    <?php endif; ?>

</div>
