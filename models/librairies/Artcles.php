<?php 
require_once './models/config.php';

// All SQL queries for the different types of article 

$req = $bdd->query('SELECT id_articles, nom_articles, prix_articles, articles_pictures FROM articles WHERE id_theme_articles = 1');

$merch = $bdd->query('SELECT id_articles, nom_articles, prix_articles, articles_pictures FROM articles WHERE id_theme_articles = 2');

$ecu = $bdd->query('SELECT id_articles, nom_articles, prix_articles, articles_pictures FROM articles WHERE id_theme_articles = 3');

$wheel_bdd = $bdd->query('SELECT id_articles, nom_articles, prix_articles, articles_pictures FROM articles WHERE id_theme_articles = 4');

$fluide_bdd = $bdd->query('SELECT id_articles, nom_articles, prix_articles, articles_pictures FROM articles WHERE id_theme_articles = 5');

$upgrade_bdd = $bdd->query('SELECT id_articles, nom_articles, prix_articles, articles_pictures FROM articles WHERE id_theme_articles = 6');

?>