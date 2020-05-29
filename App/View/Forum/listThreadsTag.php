
<?php $this->title = "Forum" ?>
<?php ob_start(); ?>
<link href="/Web/css/forum.css" rel="stylesheet">
<?php $this->head_tags = ob_get_clean();?>
<?php if (isset($data)):?>

<div id="body">
    <form method="post" action="/forum/result-threads-tag-<?php echo $data['id']?>" class="search-bar">
        <button class="sub-none" type="submit" name="search"><i class="fas fa-search fa-2x icon"></i></button>
        <input type="text" autocomplete="off" class="search-input" placeholder="Rechercher des réponses..." name="research">
    </form>

    <article>
        <?php for ($i=0;$i<count($data['listThreads']);$i++):?>
        <a href=""><h1 class="titleTag"><?php echo $data['listThreads'][$i]; ?></h1></a>

        <?php endfor; ?>
    </article>
    <?php endif; ?>

</div>