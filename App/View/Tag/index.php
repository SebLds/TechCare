
<?php $this->titre = "Mon Blog - " . $this->nettoyer($tag['titre']); ?>

<article>
    <header>
        <h1 class="titreBillet"><?= $this->nettoyer($tag['titre']) ?></h1>
        <time><?= $this->nettoyer($tag['date']) ?></time>
    </header>
    <p><?= $this->nettoyer($tag['contenu']) ?></p>
</article>
<hr />
<header>
    <h1 id="titreReponses">Réponses à <?= $this->nettoyer($tag['titre']) ?></h1>
</header>
<hr />
