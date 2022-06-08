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

<?php require'./header.php'; ?>

<body>

<!-- merch case -->
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

            // select all the items of the merch on his category
            require_once'./models/librairies/Artcles.php';
            while($main_page_merch = $merch->fetch()) { ?>

                <div class="article_main_info">

                    <a class="picture_article_wheel" href="./article.php?id_article=<?= $main_page_merch['id_articles']; ?> "><img width="50%" src="./Pictures/<?= $main_page_merch['articles_pictures']; ?>" alt="image article de la categorie "></a>
                    <a class="name_article_wheel" href="./article.php?id_article=<?= $main_page_merch['id_articles']; ?> "><h4><?= $main_page_merch['nom_articles']; ?></h4></a>
                    <h3><?= $main_page_merch['prix_articles']; ?> €</h3>

                </div>            

        <?php } ?>

    </div>
<!-- end merch case -->
</div>
</body>