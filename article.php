<?php
session_start();
require_once'./models/config.php';

            $id_article = $_GET['id_article'];

            if(trim($id_article) == '') {
                
                header('location: index.php');
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

<header>

<!-- navigation bar -->

<nav>

    <ul>
        <li>
            <a href="index.php"><img src="./Pictures/logo jdm shop.png" width="10%" alt="logo page principal"></a>
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
                                                                
                                                                </div>
                                                                 <?php
                                                             }
                                                                ?>
            </a>

        </li>

        <li>
            <a href="#"><img src="./Pictures/cart" width="50%" alt=""></a>
            <a href="#" class="text_nav">
                <h3>Panier</h3>
            </a>
        </li>

    </ul>

</nav>

<!-- end navigation bar -->

</header>


<body class="body_page_article">

<main>

     
        <?php
            
            $recup_article = $bdd->query("SELECT * FROM articles WHERE id_articles = '$id_article'");
            $show_article = $recup_article->fetch();
                     
        ?>
            
            <div class="article_case">

                <h1 class="title_article"> <?= $show_article['nom_articles']; ?> </h1>

                    <div class="article_case_detail">
                    
                        <img width="40%" src="./Pictures/<?= $show_article['articles_pictures']; ?>" alt="image article">

                        <div class="promo_case">

                            

                                <!-- calcul -15% articles en promotions -->

                                <div id="prix_promos_article">

                                    <h1 style="color: red"><strike> <?= $show_article['prix_articles']; ?> €</strike></h1>

                                    <?php

                                        $promotion_calcul = $show_article['prix_articles'];
                                        $result = ($promotion_calcul * 15) / 100;
                                        $final_price = $promotion_calcul - $result; 
                                        
                                    ?>

                                        <h1> <?= $final_price; ?> €</h1>

                                </div>

                                <!-- fin calcul -15% articles en promotions -->
                            
                            <h4> <?= $show_article['dsc_articles']; ?> </h4>

                        </div>

                    </div>

            </div>

</main>
</body>

