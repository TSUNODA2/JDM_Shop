<?php
session_start();
require_once'./models/config.php';
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

<body>
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
        <div class="car_list">
            <ul>
                <li>
                    <a class="R32_car_logo" href="#"></a>
                </li>
            </ul>
        </div>

        <!-- end navigation bar -->

    </header>

<main>

    <form class="" action="Articles.php" method="get">
     
    <?php
        require_once'./models/librairies/Artcles.php';
        ($show_articles_promotions = $req->fetch()) 
    ?>
            
            <h1> <?= $show_articles_promotions['nom_articles'] ?> </h1>
            <img src="./Pictures/<?= $show_articles_promotions['articles_pictures'] ?>" alt="image article">

        

</form>
</main>
</body>

