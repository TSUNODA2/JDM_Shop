<?php
session_start();
require_once'./models/config.php';

if(!empty($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];
}else {

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>accueil</title>
</head>

<body class="body_panier">
    
<?php require_once'./header.php'; ?>
    <main class="main_panier">

        <div class="panier_all">
    
         <?php 
             if(!empty($_SESSION['id_user'])) { // check a user id exist in the session 
                $recup_article = $bdd->query("SELECT id_panier, id_articles FROM panier WHERE id_user = '$id_user'"); // this request take all the id of the article link to the id of the user
                while($bdd_panier = $recup_article->fetch()) { ?>
            
                 <?php
                 $recup_id_articles = $bdd_panier['id_articles']; // repeat all the article id link with the user
                 $recup_detail_articles = $bdd->query("SELECT * FROM articles WHERE id_articles = '$recup_id_articles' "); // take all the article information
                 while($bdd_show_articles = $recup_detail_articles->fetch()) { ?> <!-- a while repeat all the articles necessary  -->

                    <div class="article_panier">

                     <img width="120px" src="./Pictures/<?= $bdd_show_articles['articles_pictures']; ?>" alt="image <?= $bdd_show_articles['nom_articles']; ?>"> <!-- show picture of the articles -->

                        <div class="mid_article_panier">

                            <h1> <?= $bdd_show_articles['nom_articles']; ?> </h1> <!-- show the name of the articles -->
                            
                            <?php
                                        // check if the article select, if the article are in promotion he take the price and add a promotion of -15%, but if the article are not in promotion the price has been show
                                        if($bdd_show_articles['id_theme_articles'] == 1 ) 
                                        {
                                            $promotion_calcul = $bdd_show_articles['prix_articles'];
                                            $result = ($promotion_calcul * 15) / 100;
                                            $final_price = $promotion_calcul - $result; ?>
                                            <h1><strike> <?= $bdd_show_articles['prix_articles']; ?> €</strike></h1>
                                            <h1 class="promotion_price"> <?= $final_price ?> €</h1>

                                       <?php } else { ?>

                                           <h1> <?= $bdd_show_articles['prix_articles']; ?> €</h1>

                                      <?php } ?>

                            <a href="./delete.php?delete_article_panier=<?= $bdd_panier['id_panier']; ?>">supprimer</a> <!-- this input delete the article of the cart -->

                        </div>

                    </div>
                 <?php } 
                  } ?>
            <?php } else { ?>
                 <h2> Vous devez être connecter pour pouvoir vous achetez un article</h2> <a class="login_link_panier" href="./login.php" >connectez-vous</a> <!-- if the user are not connected a link give to him a link to connect him or create account -->
            <?php } ?>

        </div>    

    </main>

    </body>