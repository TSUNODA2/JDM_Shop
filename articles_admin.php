<?php 
require_once'./models/config.php';

        if(isset($_POST['modifier']))
        {
           
            $id_articles = htmlspecialchars($_GET['id']);
            $nom_promotion = htmlspecialchars($_POST['nom_articles']);
            $prix_before_promotion = htmlspecialchars($_POST['prix_articles_admin']);
            $picture_articles_promotion = htmlspecialchars($_POST['image_article_admin']);

            $modif_articles = $bdd->prepare("UPDATE articles_promotions SET nom_promotion = ?, prix_before_promotion = ?, picture_articles_promotion = ? WHERE id_promotions = ?");
            var_dump($modif_articles->execute(array($nom_promotion, $prix_before_promotion, $picture_articles_promotion, $id_articles))); 
        
            header('location: admin.php');
        

        }else header('location: index.php');

?>