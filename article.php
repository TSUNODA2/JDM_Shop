<?php
session_start();
require_once'./models/config.php';

            // check if she get a existant id and if the article dosn't exist the user as been redirected to the main page
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

<?php require'./header.php'; ?>

<body class="body_page_article">

<main>

        <!-- article card -->
        
        <?php
            // select all the elements of the article and selected the article in function of the click of the user 
            $recup_article = $bdd->query("SELECT * FROM articles WHERE id_articles = '$id_article'");
            $show_article = $recup_article->fetch();
                     
        ?>
            
            <div class="article_case">

                <h1 class="title_article"> <?= $show_article['nom_articles']; ?> </h1>

                    <div class="article_case_detail">
                    
                        <img width="30%" src="./Pictures/<?= $show_article['articles_pictures']; ?>" alt="image article">

                        <div class="promo_case">

                                <!-- calcul -15% articles promotions -->
                                
                                <!-- if the selectioned article are in promotion this get the price and put -15% on it. and if the article was not in promotion the price don't change -->
                                <?php if( $show_article['id_theme_articles'] == 1 ) { ?>

                                <div id="prix_promos_article">

                                    <h1 style="color: red"><strike> <?= $show_article['prix_articles']; ?> €</strike></h1>

                                    <?php

                                        $promotion_calcul = $show_article['prix_articles'];
                                        $result = ($promotion_calcul * 15) / 100;
                                        $final_price = $promotion_calcul - $result; 
                                        
                                    ?>

                                        <h1> <?= $final_price; ?> €</h1>

                                </div>

                                <?php } else {?>
                                    <h1> <?= $show_article['prix_articles']; ?> € </h1>
                               <?php } ?>

                                <!-- end calcul -15% article promotion -->
                    
                            <h4> <?= $show_article['dsc_articles']; ?> </h4>

                            <a class="add_cart" href="./panier_traitement.php?id_article_cart=<?= $show_article['id_articles']; ?>">Ajouter au panier</a>

                        </div>

                    </div>

            </div>

            <!-- en article card -->
</main>
</body>

