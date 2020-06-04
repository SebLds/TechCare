<?php $this->title = "Forum" ?>
<?php ob_start(); ?>
<link href="/Web/css/forum.css" rel="stylesheet">
<?php $this->head_tags = ob_get_clean();?>
<?php if (isset($data)):?>

<div id="body">
    <article>
        <?php for ($i=0;$i<count($data['replies']);$i++):?>
            <a href=""><h1 class="titleTag"><?php echo $data['replies'][$i]->Content; ?></h1></a>
        <?php endfor; ?>
    </article>
    <?php endif; ?>

</div>
