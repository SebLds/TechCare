
<?php use src\Session;

$this->title = "Forum" ?>

<?php ob_start(); ?>
<link href="/Web/css/header.css" rel="stylesheet">
<?php $this->head_tags = ob_get_clean();?>

<article>
    <?php for ($i=0;$i<count($data['tags_info']);$i++):?>
        <h1 class="titleTag"><?php echo $data['tags_info'][$i]->Tag_Title; ?></h1>
        <p class="textTag"><?php echo $data['tags_info'][$i]->Tag_description; ?></p>

    <?php endfor; ?>
</article>


