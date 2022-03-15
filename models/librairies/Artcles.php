<?php 
session_start();
require_once './models/config.php';

$req = $bdd->query('SELECT nom_promotion, prix_before_promotion, picture_articles_promotion FROM articles_promotions');


?>