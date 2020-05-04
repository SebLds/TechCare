
<?php $this->title = "Forum" ?>
<?php ob_start(); ?>
<link href="/Web/css/header.css" rel="stylesheet">
<?php $this->head_tags = ob_get_clean();?>
<?php if (isset($data)):?>
<article>
    <?php for ($i=0;$i<count($data['tags_info']);$i++):?>
        <h1 class="titleTag"><?php echo $data['tags_info'][$i]->Tag_Title; ?></h1>
        <p class="textTag"><?php echo $data['tags_info'][$i]->Tag_description; ?></p>
        <p class="nbThreads">Il y a <?php echo $data['nbThreads'][$i]?> sujets !</p>
        <p class="nbReplies">Il y a <?php echo $data['nbReplies'][$i]?> réponses !</p>

    <?php endfor; ?>
</article>
<?php endif; ?>


