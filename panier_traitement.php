<?php 
session_start();
require_once'./models/config.php';
$id_panier = $_GET['id_article_cart'];
$id_user = $_SESSION['id_user'];
$recup_panier = $bdd->query("SELECT * FROM articles WHERE id_articles = '$id_panier' ");
// verify if the name are defined ans check if the not empty after that they insert into the bdd the element add in the input 

$price_article = $recup_panier->fetch();
var_dump($price_article['prix_articles']);

if(isset($_GET['id_article_cart']))
{
    if(!empty($_SESSION['id_user'])) {
        
        $create_panier = $bdd->prepare("INSERT INTO panier(id_user, id_articles) VALUES ('$id_user', '$id_panier')");
        $create_panier->execute(array('$id_user', '$id_panier'));
        header('location: panier.php');

    } else header('location: login.php');
    

} else {
    die("sélectionner un produit pour ajouter au panier");
}

?>  

