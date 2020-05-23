<?php $this->title = "Forum" ?>
<?php ob_start(); ?>
<link href="/Web/css/forum.css" rel="stylesheet" xmlns="http://www.w3.org/1999/html">
<?php $this->head_tags = ob_get_clean();?>
<?php if (isset($data)):?>

<div id="body">

    <article>
        <?php for ($i=0;$i<count($data['searchResult']);$i++):?>
        <a href="/forum/thread-<?php echo $data['searchResult'][$i]->ID_Thread?>"><h1 class="titleTag"><?php echo $data['searchResult'][$i]->Thread_Title; ?></h1></a>

        <?php endfor; ?>
    </article>
</div>
    <?php endif; ?>

