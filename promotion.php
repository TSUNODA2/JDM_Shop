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

<?php require'./header.php'; ?>

<body>

<!-- promotion case -->

<div class="main_case_wheel">

    <div class="top_main_case_wheel">

        <div class="top_main_wheel">

            <h1>Promotion</h1>

        </div>

        <hr>

        <br>

        <div class="texte_explication_wheel">

            <h4>Profitez des maintent de nos meilleurs promotion pour ameliorer sont vehicule sans enerver Madame</h4>

        </div>

        <br>

        <hr>

    </div>

    <div class="article_wheel_case">

        <?php 
            // select all the items of the article in fucnction of the category 
            require_once'./models/librairies/Artcles.php';
            while($main_page_upgrade = $req->fetch()) { ?>

                <div class="article_main_info">

                    <a class="picture_article_wheel" href="./article.php?id_article=<?= $main_page_upgrade['id_articles']; ?> "><img width="50%" src="./Pictures/<?= $main_page_upgrade['articles_pictures']; ?>" alt="image article de la categorie "></a>
                    <a class="name_article_wheel" href="./article.php?id_article=<?= $main_page_upgrade['id_articles']; ?> "><h4><?= $main_page_upgrade['nom_articles']; ?></h4></a>
                    <h3><?= $main_page_upgrade['prix_articles']; ?> €</h3>

                </div>            

        <?php } ?>

    </div>
    <!-- end promotion case -->
</div>
</body>