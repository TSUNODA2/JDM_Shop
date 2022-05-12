<?php 
require_once './models/config.php';

$req = $bdd->query('SELECT nom_articles, prix_articles, articles_pictures FROM articles WHERE id_theme_articles = 1');

$merch = $bdd->query('SELECT nom_articles, prix_articles, articles_pictures FROM articles WHERE id_theme_articles = 2');

$ecu = $bdd->query('SELECT nom_articles, prix_articles, articles_pictures FROM articles WHERE id_theme_articles = 3');
?>