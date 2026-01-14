<?php

class CommentController 
{
    /**
     * Vérifie que l'utilisateur est connecté.
     * @return void
     */
    private function checkIfUserIsConnected() : void
    {
        // On vérifie que l'utilisateur est connecté.
        if (!isset($_SESSION['user'])) {
            Utils::redirect("connectionForm");
        }
    }

    /**
     * Ajoute un commentaire.
     * @return void
     */
    public function addComment() : void
    {
        // Récupération des données du formulaire.
        $pseudo = Utils::request("pseudo");
        $content = Utils::request("content");
        $idArticle = Utils::request("idArticle");

        // On vérifie que les données sont valides.
        if (empty($pseudo) || empty($content) || empty($idArticle)) {
            throw new Exception("Tous les champs sont obligatoires. 3");
        }

        // On vérifie que l'article existe.
        $articleManager = new ArticleManager();
        $article = $articleManager->getArticleById($idArticle);
        if (!$article) {
            throw new Exception("L'article demandé n'existe pas.");
        }

        // On crée l'objet Comment.
        $comment = new Comment([
            'pseudo' => $pseudo,
            'content' => $content,
            'idArticle' => $idArticle
        ]);

        // On ajoute le commentaire.
        $commentManager = new CommentManager();
        $result = $commentManager->addComment($comment);

        // On vérifie que l'ajout a bien fonctionné.
        if (!$result) {
            throw new Exception("Une erreur est survenue lors de l'ajout du commentaire.");
        }

        // On redirige vers la page de l'article.
        Utils::redirect("showArticle", ['id' => $idArticle]);
    }

    /**
     * Suppression d'un commentaire.
     * @return void
     */
    public function deleteComment() : void
    {
        $this->checkIfUserIsConnected();

        // Récupération de l'id du commentaire à supprimer.
        $id = Utils::request("id");
        if (empty($id)) {
            throw new Exception("L'identifiant du commentaire est manquant.");
        }
        // On récupère le commentaire.
        $commentManager = new CommentManager();
        $comment = $commentManager->getCommentById($id);
        if (!$comment) {
            throw new Exception("Le commentaire demandé n'existe pas.");
        }
        // On supprime le commentaire.
        $result = $commentManager->deleteComment($id);
        if (!$result) {
            throw new Exception("Une erreur est survenue lors de la suppression du commentaire.");
        }
        // On redirige vers la page de l'article.
        Utils::redirect("showArticle", ['id' => $comment->getIdArticle()]);
    }
}