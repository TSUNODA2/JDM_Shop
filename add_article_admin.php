<?php 
require_once'./models/config.php';


if(isset($_POST['nom_articles']) && isset($_POST['prix_articles']) && isset($_POST['articles_pictures']) && isset($_POST['id_theme_articles']))
{
            $nom_add = htmlspecialchars($_POST['nom_articles']);
            $prix_add = htmlspecialchars($_POST['prix_articles']);
            $picture_add = htmlspecialchars($_POST['articles_pictures']);
            $theme_add = htmlspecialchars($_POST['id_theme_articles']);
            
        if(!empty($_POST['nom_articles']) AND !empty($_POST['prix_articles']) AND !empty($_POST['articles_pictures']) AND !empty($_POST['id_theme_articles']))
        {
            
            $insert_article = $bdd->prepare('INSERT INTO articles(nom_articles, prix_articles, articles_pictures, id_theme_articles)VALUES(?, ?, ?, ?)');
            $insert_article->execute(array($nom_add, $prix_add, $picture_add, $theme_add));

            header('Location: admin.php?add_err=succes');
            

        }else header('Location: admin.php?add_err=empty');

    }else header('Location: admin.php?add_err=not');

?>