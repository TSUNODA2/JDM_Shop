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

    <title>boost</title>
</head>

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

<body>

<div class="main_case_wheel">

    <div class="top_main_case_wheel">

        <div class="top_main_wheel">

            <h1>Amelioration</h1>

        </div>

        <hr>

        <br>

        <div class="texte_explication_wheel">

            <h4>Vous souhaitez cramer toute les golf R de KEKE ? c'est ici que ca ce passe !</h4>

        </div>

        <br>

        <hr>

    </div>

    <div class="article_wheel_case">

        <?php 

            require_once'./models/librairies/Artcles.php';
            while($main_page_upgrade = $upgrade_bdd->fetch()) { ?>

                <div class="article_main_info">

                    <a class="picture_article_wheel" href="./article.php?id_article=<?= $main_page_upgrade['id_articles']; ?> "><img width="50%" src="./Pictures/<?= $main_page_upgrade['articles_pictures']; ?>" alt="image article de la categorie "></a>
                    <a class="name_article_wheel" href="./article.php?id_article=<?= $main_page_upgrade['id_articles']; ?> "><h4><?= $main_page_upgrade['nom_articles']; ?></h4></a>
                    <h3><?= $main_page_upgrade['prix_articles']; ?> €</h3>

                </div>            

        <?php } ?>

    </div>

</div>
</body>