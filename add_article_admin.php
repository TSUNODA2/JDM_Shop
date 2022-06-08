<?php 
require_once'./models/config.php';

// verify if the name are defined ans check if the not empty after that they insert into the bdd the element add in the input 

if(isset($_POST['nom_articles']) && isset($_POST['prix_articles']) && isset($_POST['articles_pictures']) && isset($_POST['id_theme_articles']) && isset($_POST['dsc_articles'])) // verify if the items alredy exist
{
            // replace some character by html entities 
            $nom_add = htmlspecialchars($_POST['nom_articles']);
            $prix_add = htmlspecialchars($_POST['prix_articles']);
            $picture_add = htmlspecialchars($_POST['articles_pictures']);
            $theme_add = htmlspecialchars($_POST['id_theme_articles']);
            $dsc_add = htmlspecialchars($_POST['dsc_articles']);
            
        if(!empty($_POST['nom_articles']) AND !empty($_POST['prix_articles']) AND !empty($_POST['articles_pictures']) AND !empty($_POST['id_theme_articles']) AND !empty($_POST['dsc_articles'])) // check if all the input are completed
        {
            
            $insert_article = $bdd->prepare('INSERT INTO articles(nom_articles, prix_articles, articles_pictures, id_theme_articles, dsc_articles)VALUES(?, ?, ?, ?, ?)'); // insert all the information enter on the input in the bdd
            $insert_article->execute(array($nom_add, $prix_add, $picture_add, $theme_add, $dsc_add));

            header('Location: admin.php'); // redirect the administrator to the admin page
            

        }else header('Location: admin.php');

    }else header('Location: admin.php');

?>