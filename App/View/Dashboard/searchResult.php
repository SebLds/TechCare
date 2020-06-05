<?php $this->title='Tableau de bord'; ?>

<link href="/Web/css/dashboard.css" rel="stylesheet" type="text/css">
<link href="/Web/css/table.css" rel="stylesheet" type="text/css">

<div id="body">
    <?php if($_SESSION['sessionStatus']==2 AND isset($data)) : ?>
        <form method="post" class="search-bar" action="/dashboard/result">
            <button class="sub-none" type="submit"><i class="fal fa-search fa-2x icon"></i></button>
            <input type="text" autocomplete="off" class="search-input" placeholder="Rechercher un patient..." name="search">
        </form>
        <table class="rwd-table">
            <thead>
                <th><i class="fal fa-user"></i><span>&ensp;&ensp;Prénom</span></th>
                <th><i class="fal fa-user-tag"></i><span>&ensp;&ensp;Nom</span></th>
                <th><i class="fal fa-calendar-alt"></i><span>&ensp;&ensp;Date de naissance</span></th>
                <th><i class="fal fa-envelope"></i><span>&ensp;&ensp;Mail</span></th>
            </thead>
            <?php for ($i=0;$i<count($data['searchResult']);$i++):?>
            <tr>
                <td data-th="Prénom"><?php $firstName = $data['searchResult'][$i]->firstName; echo $firstName;?></td>
                <td data-th="Nom"><?php $lastName = $data['searchResult'][$i]->lastName; echo $lastName;?></td>
                <td data-th="Date de naissance"><?php $birthdate = $data['searchResult'][$i]->birthdate; echo $birthdate;?></td>
                <td data-th="Mail"><?php $mail = $data['searchResult'][$i]->mail; echo $mail;?></td>
                <?php endfor; ?>
            </tr>
        </table>
    <?php endif; ?>
</div>