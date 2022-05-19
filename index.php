<?php
session_start();
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

        <!-- end navigation bar -->

    </header>
    <main>

    <!-- carousel -->

        <div class="carousel">

            <div class="carousel_img carousel_img--visible">
                <a href="#"><img src="./Pictures/michelin_carousel.jpg" alt="pneu michelin"></a>
            </div>

            <div class="carousel_img">
                <a href="#"><img src="./Pictures/shell_carousel.jpg" alt="huile moteur shell"></a>
            </div>

            <div class="carousel_img">
                <a href="#"><img src="./Pictures/gt86.jpg" alt="huile moteur motul"></a>
            </div>


            <div class="carousel_actions">
                <button id="carousel_button--prev">&#8249;</button>
                <button id="carousel_button--next">&#8250;</button>
            </div>
        </div>

        <!-- end carousel -->

        <div class="first_case">

            <div class="first_case_articles">

                <a href="#" class="first_case_img"><img src="./Pictures/jr.png" width="200" alt="jantes voiture"></a>
                <a href="#" class="first_case_img"><img src="./Pictures/turbo-garrett-g25-550-072-ar-871389-5004s.png" width="200" alt="turbo"></a>

            </div>


            <div class="first_case_yellow">

                <a href="#">
                    <h3>Jantes</h3>
                </a>
                <a href="#">
                    <h3>Boost your engine !</h3>
                </a>

            </div>

        </div>

        <div class="carousel_promos">



            <div class="top_yellow">
                <h3>Promotions</h3>
            </div>
            <form class="test2" action="Articles.php" method="GET">

                <?php
                require_once './models/librairies/Artcles.php';
                while ($bdd_promotions = $req->fetch()) { ?>

                        <div class="case_carousel_articles_promotion">

                            <a href="./article.php?id_article=<?=$bdd_promotions['id_articles'] ?> "><img width="90%" src="Pictures/<?php echo $bdd_promotions['articles_pictures'];  ?>"></a>
                            <p id="prix_promos"><strike style="color:red"><?php echo $bdd_promotions['prix_articles']; ?>$</strike></p>

                            <!-- calcul -15% articles en promotions -->

                            <div id="prix_promos_after"><?php
                                                        $promotion_calcul = $bdd_promotions['prix_articles'];
                                                        $result = ($promotion_calcul * 15) / 100;
                                                        $final_price = $promotion_calcul - $result;
                                                        echo $final_price;
                                                        ?><p>$</p>
                            </div>

                            <!-- fin calcul -15% articles en promotions -->

                            <div class="case_name_yellow_promotions">
                                <?php echo $bdd_promotions['nom_articles']; ?>
                            </div>

                        </div>

                <?php } ?>
            </form>

        </div>


        <div class="bottom_article">

            <div class="merch_case">

                <div class="merch_top">

                    <h3>Merch</h3>

                </div>

                <form class="merch_form" action="Artcles.php" method="GET">


                    <?php
                    require_once './models/librairies/Artcles.php';
                    while ($bdd_merch = $merch->fetch()) { ?>

                        <div class="article_merch">

                                <a class="img_articles" href="#"><img width="45%" src="Pictures/<?php echo $bdd_merch['articles_pictures'];  ?>" alt="merch picture"></a>

                                <div class="testimg">
                                    <div class="testt">Ajouter au panier</div>
                                </div>

                            <p id="prix_merch"> <?php echo $bdd_merch['prix_articles']; ?> $</p>

                            <div class="name_merch">

                                <?php echo $bdd_merch['nom_articles']; ?>

                            </div>

                        </div>

                    <?php } ?>

                </form>

            </div>

            <div class="ecu_case">

                <div class="ecu_top">

                    <h3>ECU</h3>

                </div>

                <form class="top_article" action="Articles.php" method="get">
                    <?php
                    require_once './models/librairies/Artcles.php';
                    while ($bdd_ecu = $ecu->fetch()) { ?>
                        <div class="article_ecu">
                            <a class="img_ecu" href="#"><img width="50%" src="Pictures/<?php echo $bdd_ecu['articles_pictures']; ?>" alt="ecu pictures"></a>

                            <div class="mid_info_ecu">

                                <p id="prix_ecu"> <?php echo $bdd_ecu['prix_articles']; ?> $</p>
                                
                            </div>

                            <div class="name_ecu">
                                <?php echo $bdd_ecu['nom_articles']; ?>
                            </div>
                        </div>
                    <?php } ?>
                </form>

            </div>

        </div>


    </main>
    <script src="app.js"></script>
</body>