<?php 
    /** 
     * Affichage de la partie admin : liste des articles avec un bouton "modifier" pour chacun. 
     * Et un formulaire pour ajouter un article. 
     */
?>

<h2>Monitoring</h2>

<div class="adminArticle">
    <div class="articleLine articleMonitoring header">
        <div class="title">Titre</div>
        <div>Vues</div>
        <div>Commentaires</div>
        <div class="creationDate">Date de création</div>
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