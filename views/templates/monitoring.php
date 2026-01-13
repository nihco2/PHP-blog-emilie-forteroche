<?php 
    /** 
     * Affichage de la partie admin : liste des articles avec un bouton "modifier" pour chacun. 
     * Et un formulaire pour ajouter un article. 
     */
?>

<h2>Monitoring</h2>

<div class="adminArticle">
    <?php foreach ($articles as $article) { ?>
        <div class="articleLine">
            <div class="title"><?= $article->getTitle() ?></div>
            <div><?= $article->getViews() ?></div>
            <div><?= $article->getCommentCount() ?></div>
            <div><?= ucfirst(Utils::convertDateToFrenchFormat($article->getDateCreation())) ?></div>
        </div>
    <?php } ?>
</div>

<a class="submit" href="index.php?action=showUpdateArticleForm">Ajouter un article</a>