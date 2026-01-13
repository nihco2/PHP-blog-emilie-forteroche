<?php 
    /** 
     * Affichage de la partie admin : liste des articles avec un bouton "modifier" pour chacun. 
     * Et un formulaire pour ajouter un article. 
     */
?>

<h2>Monitoring</h2>

<div class="adminArticle">
    <div class="articleLine articleMonitoring header">
        <div class="title">Titre
            <a href="<?= $sortUrls['titleAsc'] ?>"><span class="up"></span></a>
            <a href="<?= $sortUrls['titleDesc'] ?>"><span class="down"></span></a>
        </div>
        <div class="views">Vues
            <a href="<?= $sortUrls['viewsAsc'] ?>"><span class="up"></span></a>
            <a href="<?= $sortUrls['viewsDesc'] ?>"><span class="down"></span></a>
        </div>
        <div class="commentsCount">Commentaires
            <a href="<?= $sortUrls['commentsAsc'] ?>"><span class="up"></span></a>
            <a href="<?= $sortUrls['commentsDesc'] ?>"><span class="down"></span></a>
        </div>
        <div class="creationDate">Date de création
            <a href="<?= $sortUrls['dateAsc'] ?>"><span class="up"></span></a>
            <a href="<?= $sortUrls['dateDesc'] ?>"><span class="down"></span></a>
        </div>
    </div>
    <?php foreach ($articles as $article) { ?>
        <div class="articleLine articleMonitoring">
            <div class="title"><?= $article->getTitle() ?></div>
            <div class="views"><?= $article->getViews() ?></div>
            <div class="commentsCount"><?= $article->getCommentCount() ?></div>
            <div class="creationDate"><?= ucfirst(Utils::convertDateToFrenchFormat($article->getDateCreation())) ?></div>
        </div>
    <?php } ?>
</div>