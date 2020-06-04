<?php $this->title='Tableau de bord'; ?>

<link href="/Web/css/dashboard.css" rel="stylesheet" type="text/css">
<!--<link href="/Web/css/searchBar.css" rel="stylesheet" type="text/css">-->

<div id="body">
    <?php if($_SESSION['sessionStatus']==2 AND isset($data)) : ?>
        <form method="post" class="search-bar" action="/dashboard/result">
            <button class="sub-none" type="submit"><i class="fas fa-search fa-2x icon"></i></button>
            <input type="text" autocomplete="off" class="search-input" placeholder="Rechercher un patient..." name="search">
        </form>
        <div class="table">
            <table>
                <thead>
                <th><i class="fal fa-notes-medical"></i></th>
                <th><i class="fal fa-calendar-alt"></i></th>
                <th><i class="fal fa-signal"></i></th>
                </thead>

                <?php for ($i=0;$i<count($data['searchResult']);$i++):?>
                <div class="result">
                    <tr>
                        <td class="content"><?php $firstName = $data['searchResult'][$i]->firstName; echo $firstName;?></td>
                        <td class="content"><?php $lastName = $data['searchResult'][$i]->lastName; echo $lastName;?></td>
                        <td class="content"><?php $mail = $data['searchResult'][$i]->mail; echo $mail;?></td>
                    </tr>
                </div>
                <?php endfor; ?>
            </table>
        </div>
    <?php endif; ?>

</div>