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

    <title>fluide</title>
</head>

<?php require'./header.php'; ?>

<body>

<!-- fluid page -->

<div class="main_case_wheel">

    <div class="top_main_case_wheel">

        <div class="top_main_wheel">

            <h1>Fluide</h1>

        </div>

        <hr>

        <br>

        <div class="texte_explication_wheel">

            <h4>Une bonne mechanique mérite toujours la meilleur des sauce</h4>

        </div>

        <br>

        <hr>

    </div>

    <div class="article_wheel_case">

        <?php 

            // take all the article of the fluid category
            require_once'./models/librairies/Artcles.php';
            while($main_page_fluide = $fluide_bdd->fetch()) { ?>

                <div class="article_main_info">

                    <a class="picture_article_wheel" href="./article.php?id_article=<?= $main_page_fluide['id_articles']; ?> "><img width="50%" src="./Pictures/<?= $main_page_fluide['articles_pictures']; ?>" alt="image article de la categorie "></a>
                    <a class="name_article_wheel" href="./article.php?id_article=<?= $main_page_fluide['id_articles']; ?> "><h4><?= $main_page_fluide['nom_articles']; ?></h4></a>
                    <h3><?= $main_page_fluide['prix_articles']; ?> €</h3>

                </div>            

        <?php } ?>

    </div>

    <!-- end fluid page -->

</div>
</body>