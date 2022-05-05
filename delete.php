<?php 
require_once'./models/config.php';

if(isset($_GET['id_register_delete']))
{
    

    $delete_user = $bdd->prepare('DELETE FROM user WHERE id_user = ?');
    $delete_user->execute(array($_GET['id_register_delete']));

    header('location: admin.php');

}else echo"you can't delete this";

if(isset($_GET['id_article_delete']))
{
   
    $delete_articles = $bdd->prepare('DELETE FROM articles WHERE id_articles = ?');
    $delete_articles->execute(array($_GET['id_article_delete']));

    header('location: admin.php');

}else echo"you can't delete this"

?>