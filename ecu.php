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

    <title>électronique</title>
</head>

<?php require'./header.php'; ?>

<body>

<!-- electronic page -->

<div class="main_case_wheel">

    <div class="top_main_case_wheel">

        <div class="top_main_wheel">

            <h1>électronique</h1>

        </div>

        <hr>

        <br>

        <div class="texte_explication_wheel">

            <h4>Vous souhaitez transformer votre voiture en fusée Ariane ? retrouvez nos calculateurs reprogramable, nos déco interrieur et exterieur mais attention au branchement sinon votre voiture va ce retrouver dans le prochain ghost rider</h4>

        </div>

        <br>

        <hr>

    </div>

    <div class="article_wheel_case">

        <?php 

            // take all the article for the electronic category
            require_once'./models/librairies/Artcles.php';
            while($main_page_ecu = $ecu->fetch()) { ?>

                <div class="article_main_info">

                    <a class="picture_article_wheel" href="./article.php?id_article=<?= $main_page_ecu['id_articles']; ?> "><img width="50%" src="./Pictures/<?= $main_page_ecu['articles_pictures']; ?>" alt="image article de la categorie "></a>
                    <a class="name_article_wheel" href="./article.php?id_article=<?= $main_page_ecu['id_articles']; ?> "><h4><?= $main_page_ecu['nom_articles']; ?></h4></a>
                    <h3><?= $main_page_ecu['prix_articles']; ?> €</h3>

                </div>            

        <?php } ?>

    </div>

    <!-- end electronique page -->

</div>
</body>