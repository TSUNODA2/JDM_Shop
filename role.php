<?php 
require_once'./models/config.php';

        if(isset($_GET['id_register_admin']))
        {
            
        $set_admin = $bdd->prepare("UPDATE user SET role = 'admin' WHERE id_user = ?");
        $set_admin->execute(array($_GET['id_register_admin']));
            

            header('location: admin.php');

        }else echo "une erreur c'est produite !";

        if(isset($_GET['id_register_user']))
        {
            $set_user = $bdd->prepare("UPDATE user SET role = 'user' WHERE id_user = ?");
            $set_user->execute(array($_GET['id_register_user']));

            header('location: admin.php');

        }else echo "une erreur c'est produite !";

?>