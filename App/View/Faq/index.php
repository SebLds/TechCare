<?php $this->title='Faq';?>
<link href="/Web/css/faq.css" rel="stylesheet">

<?php if (isset($data)):?>

<div id="body">

    <h2>Foire Aux Questions</h2>
    <?php if($_SESSION['sessionStatus']==3): ?>
    <a href="/admin/edit-faq"><button>Modifier la FAQ</button></a>
    <?php endif; ?>


    <form class="search-bar" method="post">
        <button class="sub-none" type="submit"><i class="fas fa-search fa-2x icon"></i></button>
        <input type="text" autocomplete="off" class="search-input" placeholder="Rechercher des réponses...">
    </form>

    <div class="accordion">
      <?php for ($i=0;$i<count($data['faq']);$i++):?>
        <div class="accordion-item">
            <a><?php $question = $data['faq'][$i]->question; echo $question; ?></a>
            <div class="content">
                <p><?php $answer = $data['faq'][$i]->answer; echo $answer; ?></p>
            </div>
        </div>
      <?php endfor; ?>
    </div>
</div>

<?php endif; ?>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="/Web/js/faq.js"></script>
