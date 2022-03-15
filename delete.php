<?php 
session_start();
require_once'./models/config.php';

if(isset($_GET['id_register_delete']))
{
    $delete_user = $bdd->prepare('DELETE FROM register WHERE id_register= ?');
    $delete_user->execute(array($_GET['id_register_delete']));

    header('location: admin.php');
}else echo"dsajkndjasdn"

?>