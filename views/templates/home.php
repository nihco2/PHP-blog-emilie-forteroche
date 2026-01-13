<?php
    /**
     * Affichage de Liste des articles. 
     */
?>

<div class="articleList">
    <?php foreach($articles as $article) { ?>
        <article class="article">
            <h2><?= $article->getTitle() ?> <span class="views">(<?= $article->getViews() ?> 
            <?php $article->getViews() > 1 ? print 'vues' : print 'vue' ?>
            -
            <?php
                $commentCount = $article->getCommentCount();
                echo $commentCount;
                $commentCount > 1 ? print ' commentaires' : print ' commentaire';
            ?>)</span></h2>
            <span class="quotation">«</span>
            <p><?= $article->getContent(400) ?></p>
            
            <div class="footer">
                <span class="info"> <?= ucfirst(Utils::convertDateToFrenchFormat($article->getDateCreation())) ?></span>
                <a class="info" href="index.php?action=showArticle&id=<?= $article->getId() ?>">Lire +</a>
            </div>
        </article>
    <?php } ?>
</div>