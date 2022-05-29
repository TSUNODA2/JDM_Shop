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

    <title>wheel</title>
</head>

<?= require'./header.php'; ?>

<body>
<!-- wheel case -->
<div class="main_case_wheel">

    <div class="top_main_case_wheel">

        <div class="top_main_wheel">

            <h1>Wheel</h1>

        </div>

        <hr>

        <br>

        <div class="texte_explication_wheel">

            <h4>Retrouvez sûr cette page nos freins, nos jantes ainsi que nos plus beau accesoires </h4>

        </div>

        <br>

        <hr>

    </div>

    <div class="article_wheel_case">

        <?php 

            // take all the items of the wheel section of the bdd
            require_once'./models/librairies/Artcles.php';
            while($main_page_wheel = $wheel_bdd->fetch()) { ?>

                <div class="article_main_info">

                    <a class="picture_article_wheel" href="./article.php?id_article=<?= $main_page_wheel['id_articles']; ?> "><img width="50%" src="./Pictures/<?= $main_page_wheel['articles_pictures']; ?>" alt="image article de la categorie "></a>
                    <a class="name_article_wheel" href="./article.php?id_article=<?= $main_page_wheel['id_articles']; ?> "><h4><?= $main_page_wheel['nom_articles']; ?></h4></a>
                    <h3><?= $main_page_wheel['prix_articles']; ?> €</h3>

                </div>            

        <?php } ?>

    </div>

</div>
<!-- end wheel case -->
</body>