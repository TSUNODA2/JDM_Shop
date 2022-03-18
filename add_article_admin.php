<?php 
require_once'./models/config.php';


if(isset($_POST['nom_promotion']) && isset($_POST['prix_before_promotion']) && isset($_POST['picture_articles_promotion']))
{
            $nom_add = htmlspecialchars($_POST['nom_promotion']);
            $prix_add = htmlspecialchars($_POST['prix_before_promotion']);
            $picture_add = htmlspecialchars($_POST['picture_articles_promotion']);

            

        if(!empty($_POST['nom_promotion']) AND !empty($_POST['prix_before_promotion']) AND !empty($_POST['picture_articles_promotion']))
        {
            
            $insert_article = $bdd->prepare('INSERT INTO articles_promotions(nom_promotion, prix_before_promotion, picture_articles_promotion)VALUES(?, ?, ?)');
            $insert_article->execute(array($nom_add, $prix_add, $picture_add));

            header('Location: admin.php?add_err=succes');
            

        }else header('Location: admin.php?add_err=empty');

    }else header('Location: admin.php?add_err=not');


?>