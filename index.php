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

<?php require'./header.php'; ?>

    <main>

    <!-- carousel -->

        <div class="carousel">
            
            <!-- pictures of the carousel -->
            <div class="carousel_img carousel_img--visible">
                <a href="./wheel.php"><img src="./Pictures/michelin_carousel.jpg" alt="pneu michelin"></a>
            </div>

            <div class="carousel_img">
                <a href="./fluide.php"><img src="./Pictures/shell_carousel.jpg" alt="huile moteur shell"></a>
            </div>

            <div class="carousel_img">
                <a href="./boost.php"><img src="./Pictures/gt86.jpg" alt="turbo timer gredy"></a>
            </div>

            <div class="carousel_actions">
                <!-- button left and right for change the carousel picture -->
                <button id="carousel_button--prev">&#8249;</button>
                <button id="carousel_button--next">&#8250;</button>
            </div>
        </div>

        <!-- end carousel -->

        <!-- case of the 2 main product of the website -->

        <div class="first_case">

            <!-- this 2 case is a shortcut to go on the 2 main product list of the website -->
            <div class="case_articles">

                <a href="./wheel.php" class="first_case_img"><img src="./Pictures/jr.png" width="45%" alt="jantes voiture"></a>
                <a href="#"><h3>Jantes</h3></a>

            </div>


            <div class="case_articles">

                <a href="./boost.php" class="first_case_img"><img src="./Pictures/turbo_garrette.png" width="50%" alt="turbo"></a>
                <a href="#"><h3>Boost !!!</h3></a>

            </div>

        </div>
            <!-- end case of the 2 main product of the website -->

        <!-- promotion case -->

        <div class="carousel_promos">



            <div class="top_yellow">
                <a href="./promotion.php"><h3>Promotions</h3></a>
            </div>
            <form class="test2" action="Articles.php" method="GET">

                <?php
                require_once './models/librairies/Artcles.php';
                
                while($bdd_promotions = $req->fetch()) { ?>

                        <div class="case_carousel_articles_promotion">

                            <a href="./article.php?id_article=<?= $bdd_promotions['id_articles']; ?> "><img width="90%" src="Pictures/<?= $bdd_promotions['articles_pictures'];  ?>"></a>
                            <p id="prix_promos"><strike style="color:red"><?= $bdd_promotions['prix_articles']; ?> ???</strike></p>

                            <!-- calcul -15% articles en promotions -->

                            <div id="prix_promos_after"><?php
                                                        $promotion_calcul = $bdd_promotions['prix_articles'];
                                                        $result = ($promotion_calcul * 15) / 100;
                                                        $final_price = $promotion_calcul - $result;
                                                        echo $final_price;
                                                        ?><p> ???</p>
                            </div>

                            <!-- fin calcul -15% articles en promotions -->

                            <div class="case_name_yellow_promotions">

                                <?= $bdd_promotions['nom_articles']; ?>
                                
                            </div>

                        </div>

                <?php } ?>
            </form>

        </div>

        <!-- end promotion case -->

        <!-- merch case -->

        <div class="bottom_article">

            <div class="merch_case">

                <div class="merch_top">

                    <a href="./merch.php"><h3>Merch</h3></a>

                </div>

                <form class="merch_form" action="Artcles.php" method="GET">


                    <?php
                    require_once './models/librairies/Artcles.php';
                    while ($bdd_merch = $merch->fetch()) { ?>

                        <div class="article_merch">

                                <a class="img_articles" href="./article.php?id_article=<?= $bdd_merch['id_articles']; ?>"><img width="45%" src="Pictures/<?= $bdd_merch['articles_pictures'];  ?>" alt="merch picture"></a>

                                <div class="testimg">
                                    <div class="testt">Ajouter au panier</div>
                                </div>

                            <p id="prix_merch"> <?= $bdd_merch['prix_articles']; ?> ???</p>

                            <div class="name_merch">

                                <?= $bdd_merch['nom_articles']; ?>

                            </div>

                        </div>

                    <?php } ?>

                </form>

            </div>

            <!-- end promotion case -->

            <!-- electronic case -->

            <div class="ecu_case">

                <div class="ecu_top">

                    <a href="./ecu.php"><h3>ECU</h3></a>

                </div>

                <form class="top_article" action="Articles.php" method="get">
                    <?php
                    require_once './models/librairies/Artcles.php';
                    while ($bdd_ecu = $ecu->fetch()) { ?>
                        <div class="article_ecu">
                            <a class="img_ecu" href="./article.php?id_article=<?= $bdd_ecu['id_articles']; ?> "><img width="50%" src="Pictures/<?= $bdd_ecu['articles_pictures']; ?>" alt="ecu pictures"></a>

                            <div class="mid_info_ecu">

                                <p id="prix_ecu"> <?= $bdd_ecu['prix_articles']; ?> ???</p>
                                
                            </div>

                            <div class="name_ecu">
                                <?= $bdd_ecu['nom_articles']; ?>
                            </div>
                        </div>
                    <?php } ?>
                </form>

            </div>

        </div>

        <!-- end electronic case -->

    </main>
    <!-- link for the javascrip content -->
    <script src="app.js"></script>
</body>