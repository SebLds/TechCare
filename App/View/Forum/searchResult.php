<?php $this->title = "Forum" ?>
<?php ob_start(); ?>
<link href="/Web/css/forum.css" rel="stylesheet" xmlns="http://www.w3.org/1999/html">
<?php $this->head_tags = ob_get_clean();?>
<?php if (isset($data)):?>

<div id="body">
    <form method="post" action="/forum/result-threads-tag-<?php echo $data['id']?>" class="search-bar">
        <button class="sub-none" type="submit" name="search" class="sub-none"><i class="fas fa-search fa-2x icon"></i></button>
        <input type="text" autocomplete="off" class="search-input" placeholder="Rechercher des sujets..." name="research">
    </form>
    <article>
        <?php for ($i=0;$i<count($data['searchResult']);$i++):?>
        <a href="/forum/thread-<?php echo $data['searchResult'][$i]->ID_Thread?>"><h1 class="titleTag"><?php echo $data['searchResult'][$i]->Thread_Title; ?></h1></a>

        <?php endfor; ?>
    </article>
</div>
    <?php endif; ?>

