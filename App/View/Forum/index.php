
<?php $this->title = "Forum";?>
<?php ob_start(); ?>
<link href="/Web/css/forum.css" rel="stylesheet">
<link href="/Web/css/button.css" rel="stylesheet">
<?php $this->head_tags = ob_get_clean();?>
<?php if (isset($data)):?>

  <div id="body">
      <form method="post" action="/forum/result-threads" class="search-bar">
          <button class="sub-none" type="submit" name="search" class="sub-none"><i class="fas fa-search fa-2x icon"></i></button>
          <input type="text" autocomplete="off" class="search-input" placeholder="Rechercher des réponses..." name="research">
      </form>
      <div>
          <article>
              <?php for ($i=0;$i<count($data['tags_info']);$i++):?>
                  <?php $idTag=$data['tags_info'][$i]->ID_Tag?>
                  <a href="/forum/tag-<?php echo $idTag?>"><h1 class="titleTag"><?php echo $data['tags_info'][$i]->Tag_Title; ?></h1></a>
                  <p class="textTag"><?php echo $data['tags_info'][$i]->Tag_description; ?></p>
                  <p class="nbThreads">Il y a <?php echo $data['nbThreads'][$i]?> sujets !</p>
                  <p class="nbReplies">Il y a <?php echo $data['nbReplies'][$i]?> réponses !</p>
              <?php endfor; ?>
          </article>
      </div>

      <button type="submit" class="btn add" style="margin-left: 20px" name="add"><i class="far fa-plus-square"></i>Ajouter</button>

      <form method="post">
        <div class="tag">
          <?php for ($i=0;$i<count($data['tags_info']);$i++):?>
            <?php $idTag=$data['tags_info'][$i]->ID_Tag?>
              <div class="tag-name">
                <a href="/forum/tag-<?php echo $idTag?>" name="Tag_title"><?php echo $data['tags_info'][$i]->Tag_Title; ?></a>
                <p><?php echo $data['nbThreads'][$i]?> sujets</p>
                <p><?php echo $data['nbReplies'][$i]?> réponses</p>
                <button type="submit" class="btn delete" style="margin-left: 20px" name="delete"><i class="far fa-trash"></i>Supprimer</button>
              </div>
              <div class="desc">
                  <p class="textTag"><?php echo $data['tags_info'][$i]->Tag_description; ?></p>
              </div>
          <?php endfor; ?>
        </div>
      </form>

  </div>
<?php endif; ?>
