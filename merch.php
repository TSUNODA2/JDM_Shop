<?php
session_start();
// require_once'./models/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>merch</title>
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

<body>

<div class="main_case_wheel">

    <div class="top_main_case_wheel">

        <div class="top_main_wheel">

            <h1>Produits dériver</h1>

        </div>

        <hr>

        <br>

        <div class="texte_explication_wheel">

            <h4>Retrouvez nos plus beaux vêtements ainsi que nos plus beaux produits dériver pour étendre votre passion pour l'automobile de la tête au pied et du sol au plafond !</h4>

        </div>

        <br>

        <hr>

    </div>

    <div class="article_wheel_case">

        <?php 

            require_once'./models/librairies/Artcles.php';
            while($main_page_merch = $merch->fetch()) { ?>

                <div class="article_main_info">

                    <a class="picture_article_wheel" href="./article.php?id_article=<?= $main_page_merch['id_articles']; ?> "><img width="50%" src="./Pictures/<?= $main_page_merch['articles_pictures']; ?>" alt="image article de la categorie "></a>
                    <a class="name_article_wheel" href="./article.php?id_article=<?= $main_page_merch['id_articles']; ?> "><h4><?= $main_page_merch['nom_articles']; ?></h4></a>
                    <h3><?= $main_page_merch['prix_articles']; ?> €</h3>

                </div>            

        <?php } ?>

    </div>

</div>
</body>