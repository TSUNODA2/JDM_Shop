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
        <nav>
            
            <ul>
                <li>
                    <a href="index.php" ><img src="./Pictures/logo jdm shop.png" width="7%" alt=""></a>
                </li>

                <li>
                    <a href="#"><img src="./Pictures/phone" width="37%" alt=""></a>
                    <a class="text_nav" href="#"><h3>Contactez-nous</h3></a>
                </li>

                <li>
                    <a href="#"><img src="./Pictures/account" width="45%" alt=""></a>
                    <a href="register.php" class="text_nav"><h3>Mon compte</h3></a>
                </li>

                <li>
                    <a href="#"><img src="./Pictures/cart" width="50%" alt=""></a>
                    <a href="#" class="text_nav"><h3>Panier</h3></a>
                </li>

            </ul>

        </nav>
    </header>
    <main>

        <div class="carousel">

            <div class="carousel_img carousel_img--visible">
                <img src="./Pictures/michelin_carousel.jpg" alt="pneu michelin">
            </div>

            <div class="carousel_img">
                <img src="./Pictures/shell_carousel.jpg" alt="huile moteur shell">
            </div>

            <div class="carousel_img">
                <img src="./Pictures/motul nissan gtr.jpg" alt="mise en avant garage">
            </div>


            <div class="carousel_actions">
                <button id="carousel_button--prev">&#8249;</button>
                <button id="carousel_button--next">&#8250;</button>
            </div>
        </div>

        <div class="first_case">

            <div class="first_case_articles">

             <a href="#" class="first_case_img"><img src="./Pictures/jr.png" width="200" alt="jantes voiture"></a>
             <a href="#" class="first_case_img"><img src="./Pictures/turbo-garrett-g25-550-072-ar-871389-5004s.png" width="200" alt="turbo"></a>
            
            </div>

            
            <div class="first_case_yellow">

             <a href="#"><h3>Jantes</h3></a>
             <a href="#"><h3>Boost your engine !</h3></a>

            </div>

        </div>

    <div class="carousel_promos">

        

            <div class="top_yellow">
                <h3>Promotions</h3>
            </div>
        <form class="test2" action="Articles.php" method="GET">

            <?php 
            require_once'./models/librairies/Artcles.php';
            while($bdd_promotions = $req->fetch()){ ?>

                <div class="case_articles_promotions">  

                    <div class="case_carousel_articles_promotion">

                     <img width="260px" src="Pictures/<?php echo $bdd_promotions['picture_articles_promotion'];  ?>"> 
                     <p id="prix_promos"><strike style="color:red"><?php echo $bdd_promotions['prix_before_promotion']; ?>$</strike></p>

            <!-- calcul -15% articles en promotions -->

                     <div id="prix_promos_after"><?php 
                     $promotion_calcul = $bdd_promotions['prix_before_promotion'];
                     $result = ($promotion_calcul*15)/100;
                     $final_price = $promotion_calcul-$result;
                     echo $final_price;
                     ?><p>$</p></div>

          <!-- fin calcul -15% articles en promotions -->

                <div class="case_name_yellow_promotions">
                    <?php echo $bdd_promotions['nom_promotion']; ?>
                </div>
                
                </div>

            </div>
          <?php }?>
        </form>

    </div>
       
    </main>
    <script src="app.js"></script>
    </body>