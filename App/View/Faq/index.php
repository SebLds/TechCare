<?php $this->title='Faq';?>
<link href="/Web/css/faq.css" rel="stylesheet">
<link href="/Web/css/button.css" rel="stylesheet">

<?php if (isset($data)):?>

<div id="body">

    <div class="top">
      <form class="search-bar" method="post">
          <?php if($_SESSION['sessionStatus']==3): ?>
          <a href="/admin/edit-faq"><button type="button" class="btn edit"><i class="far fa-edit"></i>Modifier</button></a>
          <?php endif; ?>
      </form>
    </div>


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
