<?php 
require_once'./models/config.php';

        if(isset($_POST['modifier']))
        {
           
            $id_articles = htmlspecialchars($_GET['id']);
            $nom_promotion = htmlspecialchars($_POST['nom_articles_admin']);
            $prix_before_promotion = htmlspecialchars($_POST['prix_articles_admin']);
            $picture_articles_promotion = htmlspecialchars($_POST['articles_pictures_admin']); 
            $theme_article = htmlspecialchars($_POST['theme_article']);
            $dsc_article_change = htmlspecialchars($_POST['dsc_article']);

            $modif_articles = $bdd->prepare("UPDATE articles SET nom_articles = ?, prix_articles = ?, articles_pictures = ?, id_theme_articles = ?, dsc_articles = ? WHERE id_articles = ?");
            var_dump($modif_articles->execute(array($nom_promotion, $prix_before_promotion, $picture_articles_promotion, $theme_article, $dsc_article_change, $id_articles))); 
        
            header('location: admin.php');
        

        }else header('location: index.php');

?>