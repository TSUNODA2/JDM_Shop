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
    <header>

        <!-- navigation bar -->

        <nav>

            <ul>
                <li>
                    <a href="index.php"><img src="./Pictures/logo jdm shop.png" style="width: 50px;" alt="logo page principal"></a>
                </li>

                <li>

                    <a href="register.php" class="text_nav">
                                                                     <?php 
                                                                     if(empty($_SESSION['prenom']))
                                                                     {
                                                                         ?>
                                                                         <a class="login_nav" href="login.php">connectez-vous</a>
                                                                         <?php
                                                                     } else 
                                                                     { ?>
                                                                        <div class="user_nav">
                                                                         
                                                                            <a class="user_show" href="user.php"><h3>bonjour,<?= $_SESSION['prenom']; ?></h3></a> 
                                                                            <a class="logout_button" href="logout.php"><button>LOGOUT</button></a>

                                                                            <?php 
                
                                                                        if(empty($_SESSION['role']))
                                                                        {

                                                                        } elseif($_SESSION['role'] === 'admin')
                                                                        { ?>
                                                                            <a class="admin_button" href="./admin.php">admin</a>
                                                                <?php } ?>
                                                                        
                                                                        </div>
                                                                         <?php
                                                                     }
                                                                        ?>
                    </a>

                    


                </li>

                

                <li>
                    
                    <a class="panier_nav" href="#" class="text_nav">
                        <img src="./Pictures/cart" style="width:40%;"  alt="">
                        <h3>Panier</h3>
                    </a>
                </li>

            </ul>

        </nav>

        <!-- end navigation bar -->

    </header>

    <main class="main_panier">

        <div class="panier_all">
    
         <?php 
             if(!empty($_SESSION['id_user'])) {
                $recup_article = $bdd->query("SELECT id_panier, id_articles FROM panier WHERE id_user = '$id_user'");
                while($bdd_panier = $recup_article->fetch()) { ?>
            
                 <?php
                 $recup_id_articles = $bdd_panier['id_articles'];
                 $recup_detail_articles = $bdd->query("SELECT * FROM articles WHERE id_articles = '$recup_id_articles' ");
                 while($bdd_show_articles = $recup_detail_articles->fetch()) { ?>

                    <div class="article_panier">

                     <img width="150px" src="./Pictures/<?= $bdd_show_articles['articles_pictures']; ?>" alt="image <?= $bdd_show_articles['nom_articles']; ?>">

                        <div class="mid_article_panier">

                            <h1> <?= $bdd_show_articles['nom_articles']; ?> </h1>
                            <h1> <?= $bdd_show_articles['prix_articles']; ?> €</h1>
                            <a href="./delete.php?delete_article_panier=<?= $bdd_panier['id_panier']; ?>">supprimer</a>

                        </div>

                    </div>
                 <?php } 
                  } ?>
            <?php } else { ?>
                 <h2>Vous devez être connecter pour pouvoir vous achetez un article</h2> <a class="login_link_panier" href="./login.php">connectez-vous</a>
            <?php } ?>

        </div>    

    </main>

    </body>