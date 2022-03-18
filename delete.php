<?php 
require_once'./models/config.php';

if(isset($_GET['id_register_delete']))
{
    

    $delete_user = $bdd->prepare('DELETE FROM register WHERE id_register = ?');
    $delete_user->execute(array($_GET['id_register_delete']));

    header('location: admin.php');
}else echo"you can't delete this";

if(isset($_GET['id_article_delete']))
{
   
    $delete_articles = $bdd->prepare('DELETE FROM articles_promotions WHERE id_promotions = ?');
    $delete_articles->execute(array($_GET['id_article_delete']));

    header('location: admin.php');

}else echo"you can't delete this"

?>